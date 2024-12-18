<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    function __construct()
    {
        $this->middleware('permission:product-list|product-create|product-edit|product-delete', ['only' => ['index', 'show']]);
        $this->middleware('permission:product-create', ['only' => ['create', 'store']]);
        $this->middleware('permission:product-edit', ['only' => ['edit', 'update']]);
        $this->middleware('permission:product-delete', ['only' => ['destroy']]);
        $this->middleware('permission:product-list', ['only' => ['index']]);
    }
    /**
     * Display a listing of the resource start page.
     * @return \Illuminate\View\View
     */
    public function welcome(): View
    {
        return view(
            'welcome',
            [
                'products' => Product::all()->map(function ($product) {
                    $product->booked_from_date = date('Y-m-d', strtotime($product->booked_from));
                    $product->booked_to_date = date('Y-m-d', strtotime($product->booked_to));
                    $product->booked_from_hours = date('H:i', strtotime($product->booked_from));
                    $product->booked_to_hours = date('H:i', strtotime($product->booked_to));
                    $product->user_checked = DB::table('registration')->where('event_id', $product->id)->count();
                    $product->checked = DB::table('registration')->where('user_id', Auth::id())->where('event_id', $product->id)->count() ?? null;
                    $product->deference = round(Carbon::parse($product->booked_from)->diffInMinutes(Carbon::parse($product->booked_to)), 2);

                    return $product;
                })->sortBy('booked_from')

            ]
        );
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(): View
    {
        $products = $this->getProductsForUser();

        return view('products.index', compact('products'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    private function getProductsForUser()
    {
        $role = DB::table('model_has_roles')->where('model_id', Auth::user()->id)->get();
        $role_name = DB::table('roles')->where('id', $role[0]->role_id)->first()->name;

        return $role_name === 'Admin'
            ? Product::latest()->paginate(5)
            : Product::where('user_id', Auth::id())->latest()->paginate(5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(): View
    {
        return view('products.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request): RedirectResponse
    {
        request()->validate([
            'title' => 'required|string|max:255|min:3',
            'detail' => 'required|string|max:3000|min:3',
            'booked_from' => 'required|date|after:today',
            'booked_to' => 'required|date|after:booked_from',
        ]);
        $request['user_id'] = Auth::id();


        Product::create($request->all());

        return redirect()->route('products.index')
            ->with('success', 'Product created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product): View
    {
        return view('products.show', compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product): View
    {
        return view('products.edit', compact('product'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product): RedirectResponse
    {
        request()->validate([
            'title' => 'required|string|max:255|min:3',
            'detail' => 'required|string|max:3000|min:3',
            'booked_from' => 'required|date|after:today',
            'booked_to' => 'required|date|after:booked_from',
        ]);

        $product->update($request->all());

        return redirect()->route('products.index')
            ->with('success', 'Product updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product): RedirectResponse
    {
        $product->delete();

        return redirect()->route('products.index')
            ->with('success', 'Product deleted successfully');
    }
    public function checkin($id): RedirectResponse
    {
        $product = Product::find($id);
        $event = DB::table('registration')->where('user_id', Auth::id())->where('event_id', $id)->first();
        if (!$event) {
            DB::table('registration')->insert([
                'user_id' => Auth::id(),
                'event_id' => $id,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
            $message = 'You checked in successfully';
            return redirect()->route('product-welcome', ['#' . ($product->id)])->with('ok', $message);
        } else {
            DB::table('registration')->where('user_id', Auth::id())->where('event_id', $id)->delete();
            $message = 'You unchecked successfully';
            return redirect()->route('product-welcome', ['#' . ($product->id)])->with('error', $message);
        }
    }

}
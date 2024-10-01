<?php

namespace App\Http\Controllers;

use App\Models\Product;

use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {

        $products = Product::all();
        $products->map(function ($product) {
            $product->booked_from_date = date('Y-m-d', strtotime($product->booked_from));
            $product->booked_to_date = date('Y-m-d', strtotime($product->booked_to));
            $product->booked_from_hours = date('H:i', strtotime($product->booked_from));
            $product->booked_to_hours = date('H:i', strtotime($product->booked_to));
            $product->user_checked = DB::table('registration')->where('event_id', $product->id)->count();
            $product->checked = DB::table('registration')->where('user_id', Auth::id())->where('event_id', $product->id) ?? null;
            $product->deference = Carbon::parse($product->booked_from)->diffInMinutes(Carbon::parse($product->booked_to));

            return $product;
        });

        $my_Checks = DB::table('registration')->where('user_id', Auth::id())->get();

        dump($my_Checks);

        return view('home', [
            'products' => $products,
            'my_Checks' => $my_Checks
        ]);
    }
}
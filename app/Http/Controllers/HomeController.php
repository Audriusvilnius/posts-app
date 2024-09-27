<?php

namespace App\Http\Controllers;

use App\Models\Product;

use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

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
        // $products = Product::where('booked_from', '>', now())->get();
        $products = Product::all();
        $products->map(function ($product) {
            $product->booked_from_date = date('Y-m-d', strtotime($product->booked_from));
            $product->booked_to_date = date('Y-m-d', strtotime($product->booked_to));
            $product->booked_from_hours = date('H:i', strtotime($product->booked_from));
            $product->booked_to_hours = date('H:i', strtotime($product->booked_to));

            $product->deference = Carbon::parse($product->booked_from)->diffInMinutes(Carbon::parse($product->booked_to));

            return $product;
        });

        return view('home', [
            'products' => $products,
        ]);
    }
}
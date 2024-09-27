<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\HomeController as Home;
use App\Http\Controllers\RoleController as Role;
use App\Http\Controllers\UserController as User;
use App\Http\Controllers\ProductController as Product;
use App\Models\Product as ProductModel;
use App\Http\Controllers\PermissionController as Permission;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;


Route::get('/', function () {
    return view(
        'welcome',
        [
            'products' => ProductModel::all()->map(function ($product) {
                $product->booked_from_date = date('Y-m-d', strtotime($product->booked_from));
                $product->booked_to_date = date('Y-m-d', strtotime($product->booked_to));
                $product->booked_from_hours = date('H:i', strtotime($product->booked_from));
                $product->booked_to_hours = date('H:i', strtotime($product->booked_to));

                $product->deference = Carbon::parse($product->booked_from)->diffInMinutes(Carbon::parse($product->booked_to));

                return $product;
            })->sortBy('booked_from_date')

        ]
    );
});

Route::get('/second', function () {
    return view('second');
});

Auth::routes();

Route::get('/home', [Home::class, 'index'])->name('home');

Route::group(['middleware' => ['auth']], function () {
    Route::resource('roles', Role::class);
    Route::resource('users', User::class);
    Route::resource('products', Product::class);
    Route::resource('permissions', Permission::class);

});
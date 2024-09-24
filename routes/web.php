<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\HomeController as Home;
use App\Http\Controllers\RoleController as Role;
use App\Http\Controllers\UserController as User;
use App\Http\Controllers\ProductController as Product;
use App\Http\Controllers\PermissionController as Permission;
use Illuminate\Support\Facades\Auth;


Route::get('/', function () {
    return view('home');
});

Auth::routes();

Route::get('/home', [Home::class, 'index'])->name('home');

Route::group(['middleware' => ['auth']], function () {
    Route::resource('roles', Role::class);
    Route::resource('users', User::class);
    Route::resource('products', Product::class);
    Route::resource('permissions', Permission::class);
});
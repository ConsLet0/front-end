<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('userpage.page.homepage');
});

Route::get('/product', function () {
    return view('userpage.page.showproduct');
});

Route::get('/contact', function () {
    return view('userpage.page.contact');
});

Route::get('/cart', function () {
    return view('userpage.page.cart');
});

Route::get('/checkout', function () {
    return view('userpage.page.checkout');
});

Route::get('/status', function () {
    return view('userpage.page.status');
});
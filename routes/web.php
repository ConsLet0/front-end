<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\MenuCategoryController;

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
//  Userpage
Route::get('/', function () {
    return view('userpage.page.homepage');
});

// Route::get('/product', function () {
//     return view('userpage.page.showproduct');
// });

Route::get('{id}', [ProductController::class, 'show_products']);

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

Route::get('/deatils', function () {
    return view('userpage.page.productdetails');
});
// Adminpage
Route::get('/login', function () {
    return view('adminpage.page.login');
});

Route::get('/homepage', function () {
    return view('adminpage.page.homepage');
});

Route::get('/category', [MenuCategoryController::class, 'get_all_onadmin']);
Route::post('/add_menu_category', [MenuCategoryController::class, 'add_menu_category']);
Route::post('/edit_menu_category', [MenuCategoryController::class, 'edit_menu_category']);
Route::post('/delete_menu_category/{id}', [MenuCategoryController::class, 'delete_menu_category']);

Route::get('/products', function () {
    return view('adminpage.page.products');
});

Route::get('/table', function () {
    return view('adminpage.page.table');
});

Route::get('/order', function () {
    return view('adminpage.page.order');
});

Route::get('/detailorder/incoming', function () {
    return view('adminpage.page.detailorder-incoming');
});

Route::get('/detailorder/all', function () {
    return view('adminpage.page.detailorder-allorder');
});

Route::get('/admin', function () {
    return view('adminpage.page.admin');
});
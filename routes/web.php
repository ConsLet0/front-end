<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\TableController;
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
Route::get('/category/{id}', [ProductController::class, 'show_products']);
Route::get('/menu/{id}', [ProductController::class, 'show_products_by_menucategory']);
Route::get('/add_to_cart/{id}', [OrderController::class, 'add_to_cart'])->name('add_to_cart');
Route::get('/cart', [OrderController::class, 'view_cart'])->name('view_cart');
Route::get('/remove_cart/{id}', [OrderController::class, 'remove_cart'])->name('remove_cart');
Route::get('/checkout', [OrderController::class, 'checkout'])->name('checkout');
Route::get('/detail/{id}', [ProductController::class, 'product_detail']);
Route::get('/contact', function () {
    return view('userpage.page.contact');
});

Route::get('/status', function () {
    return view('userpage.page.status');
});

// Adminpage
Route::get('/login', function () {
    return view('adminpage.page.login');
});
Route::post('/login', [UserController::class, 'signin']);
Route::middleware(['admin'])->group(function () {
    Route::get('/homepage', function () {
        return view('adminpage.page.homepage');
    })->name('admin_home');
    Route::get('/category', [MenuCategoryController::class, 'get_all_onadmin']);
    Route::post('/add_menu_category', [MenuCategoryController::class, 'add_menu_category']);
    Route::post('/edit_menu_category', [MenuCategoryController::class, 'edit_menu_category']);
    Route::post('/delete_menu_category/{id}', [MenuCategoryController::class, 'delete_menu_category']);
    Route::get('/products', [ProductController::class, 'show_products_onadmin']);
    Route::get('/table', [TableController::class, 'show_tables_onadmin']);
    Route::get('/admin', [UserController::class, 'show_all_admin']);
    Route::post('/add_admin', [UserController::class, 'add_admin']);

    Route::get('/order', function () {
        return view('adminpage.page.order');
    });
    
    Route::get('/detailorder/incoming', function () {
        return view('adminpage.page.detailorder-incoming');
    });
    
    Route::get('/detailorder/all', function () {
        return view('adminpage.page.detailorder-allorder');
    });
    
    // Route::get('/admin', function () {
    //     return view('adminpage.page.admin');
    // });
});
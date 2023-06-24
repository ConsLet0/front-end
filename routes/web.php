<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\TableController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\OrderDetailController;
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
Route::get('/product_detail/{id}', [ProductController::class, 'product_detail']);
Route::get('/download_bill/{id}', [OrderController::class, 'download_bill'])->name('download_bill');

Route::get('/contact', function () {
    return view('userpage.page.contact');
});
Route::get('/status', [OrderController::class, 'show_ordered']);

// Adminpage
Route::get('/login', function () {
    return view('adminpage.page.login');
});
Route::post('/login', [UserController::class, 'signin']);
Route::middleware(['admin'])->group(function () {
    Route::get('/homepage', [AdminController::class, 'dashboard'])->name('admin_home');

    Route::get('/category', [MenuCategoryController::class, 'get_all_onadmin'])->name('admin_category');
    Route::get('/edit_category_page/{id}', [MenuCategoryController::class, 'edit_category_page']);
    Route::post('/add_menu_category', [MenuCategoryController::class, 'add_menu_category']);
    Route::post('/edit_menu_category/{id}', [MenuCategoryController::class, 'edit_menu_category'])->name('edit_menu_category');
    Route::get('/delete_menu_category/{id}', [MenuCategoryController::class, 'delete_menu_category']);

    Route::get('/products', [ProductController::class, 'show_products_onadmin'])->name('admin_product');
    Route::post('/add_product', [ProductController::class, 'add_product']);
    Route::get('/edit_product_page/{id}', [ProductController::class, 'edit_product_page']);
    Route::post('/edit_product/{id}', [ProductController::class, 'update_product']);
    Route::get('/delete_product/{id}', [ProductController::class, 'delete_product']);

    Route::get('/table', [TableController::class, 'show_tables_onadmin'])->name('admin_table');
    Route::post('/add_table', [TableController::class, 'add_table']);
    Route::get('/edit_table/{id}', [TableController::class, 'edit_table_page']);
    Route::post('/edit_table/{id}', [TableController::class, 'edit_table']);
    Route::get('/delete_table/{id}', [TableController::class, 'delete_table']);

    Route::get('/admin', [UserController::class, 'show_all_admin'])->name('admin_admin');
    Route::post('/add_admin', [UserController::class, 'add_admin']);

    Route::get('/order', [AdminController::class, 'order']);
    Route::get('/order_detail/{id}', [AdminController::class, 'order_detail']);
    Route::post('/finish_order', [AdminController::class, 'finish_order']);
    Route::post('/cancel_order', [AdminController::class, 'cancel_order']);
    Route::get('/delete_order/{id}', [AdminController::class, 'delete_order']);

    // Route::get('/detailorder/all', function () {
    //     return view('adminpage.page.detailorder-allorder')->name('admin_order');
    // });
    
    // Route::get('/admin', function () {
    //     return view('adminpage.page.admin');
    // });
});
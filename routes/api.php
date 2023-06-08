<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FoodController;
use App\Http\Controllers\DrinkController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\FoodCategoryController;
use App\Http\Controllers\MenuCategoryController;
use App\Http\Controllers\DrinkCategoryController;
use App\Http\Controllers\ProductCategoryController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('/add_product_category', [ProductCategoryController::class, 'add_product_category']);
Route::post('/add_menu_category', [MenuCategoryController::class, 'add_menu_category']);
Route::post('/add_product', [ProductController::class, 'add_product']);

// Route::post('/add_food_category', [FoodCategoryController::class, 'add_food_category']);
// Route::post('/add_food', [FoodController::class, 'add_food']);
// Route::post('/add_drink_category', [DrinkCategoryController::class, 'add_drink_category']);
// Route::post('/add_drink', [DrinkController::class, 'add_drink']);

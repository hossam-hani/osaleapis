<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\ShopController;
use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\ProductsController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\AddressesContoller;
use App\Http\Controllers\ContactsController;
use App\Http\Controllers\OrderController;



/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// users
Route::post("/users",[UsersController::class, 'createUser']);
Route::post("/users/login",[UsersController::class, 'login']);
Route::post("/users/detials",[UsersController::class, 'login']);
Route::middleware('auth:api')->post("/users/createCashierman",[UsersController::class, 'createCashierman']);
// shop
Route::post("/shops",[ShopController::class, 'createShop']);
Route::middleware('auth:api')->get("/shop/detials",[ShopController::class, 'getShopDetails']);
Route::middleware('auth:api')->get("/user/detials",[UsersController::class, 'getUserDetails']);
// categories
Route::middleware('auth:api')->post("/categories",[CategoriesController::class, 'createCategory']);
Route::middleware('auth:api')->post("/categories/{id}",[CategoriesController::class, 'updateCategory']);
Route::get("/categories/{shop_id}",[CategoriesController::class, 'getCategoriesByShopid']);
Route::get("/categories/{id}/products",[ProductsController::class, 'getProductsByCategoryId']);
// products
Route::middleware('auth:api')->post("/products",[ProductsController::class, 'createProdcut']);
Route::middleware('auth:api')->post("/products/{id}",[ProductsController::class, 'updateProduct']);
// customers
Route::middleware('auth:api')->post("/customers",[CustomerController::class, 'createCustomer']);
Route::middleware('auth:api')->get("/customers/{id}",[CustomerController::class, 'customerDetails']);
// addresses
Route::middleware('auth:api')->post("/addresses",[AddressesContoller::class, 'createAddress']);
// contacts
Route::middleware('auth:api')->post("/contacts",[ContactsController::class, 'createContact']);
// orders
Route::middleware('auth:api')->post("/orders",[OrderController::class, 'createOrder']);










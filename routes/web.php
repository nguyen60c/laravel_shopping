<?php

use App\Http\Controllers\spatie\PermissionsController;
use App\Http\Controllers\spatie\RolesController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::group(['namespace' => 'App\Http\Controllers'], function () {
    /**
     * Home Routes
     */
    Route::get('/', 'HomeController@index')->name('home.index');

    Route::group(['middleware' => ['guest']], function () {
        /**
         * Register Routes
         */
        Route::get(
            '/register',
            'auth\RegisterController@show'
        )->name('register.show');
        Route::post('/register', 'auth\RegisterController@register')->name('register.perform');

        /**
         * Login Routes
         */
        Route::get('/login', 'auth\LoginController@show')->name('login.show');
        Route::post('/login', 'auth\LoginController@login')->name('login.perform');
    });

    Route::group(['middleware' => ['auth']], function () {
        /**
         * Logout Routes
         */
        Route::get('/logout', 'LogoutController@perform')->name('logout.perform');

        /**
         * User Routes
         */
        Route::group(["prefix" => 'users'], function () {
            Route::get("/", "users\UsersController@index")->name("users.index");
            Route::get("/create", "users\UsersController@create")->name("users.create");
            Route::post("/create", "users\UsersController@store")->name("users.store");
            Route::get("/{user}/show", "users\UsersController@show")->name("users.show");
            Route::get("/{user}/edit", "users\UsersController@edit")->name("users.edit");
            Route::patch("/{user}/update", "users\UsersController@update")->name("users.update");
            Route::delete("/{user}/delete", "users\UsersController@destroy")->name("users.destroy");
        });

        /**
         * User Routes
         */
        Route::group(["prefix" => 'products'], function () {
            Route::get("/", "products\ProductsController@index")->name("products.index");
            Route::get("/create", "products\ProductsController@create")->name("products.create");
            Route::post("/create", "products\ProductsController@store")->name("products.store");
            Route::get("/{product}/show", "products\ProductsController@show")->name("products.show");
            Route::get("/{product}/edit", "products\ProductsController@edit")->name("products.edit");
            Route::patch("/{product}/update", "products\ProductsController@update")->name("products.update");
            Route::delete("/{product}/delete", "products\ProductsController@destroy")->name("products.destroy");

            Route::get("/products", "products\ProductsController@showProducts")->name("products.showProducts");
            Route::get("/{product}/buy","products\ProductsController@showDetailsProduct")->name("product.details");
//            Route::post("/{product}/buy", "products\ProductsController@buyProducts")->name("products.buy");
            Route::get("/product", [\App\Http\Controllers\products\ProductsController::class,"compareAmountInput"]);
        });

        /*
         * Cart routes
         */
        Route::group(["prefix"=>"cart"],function(){
            Route::get("cart",[\App\Http\Controllers\Carts\CartController::class,"index"])->name("cart.index");
            Route::post("cart",[\App\Http\Controllers\Carts\CartController::class,"store"])->name("cart.store");
            Route::post("cart/update",[\App\Http\Controllers\Carts\CartController::class,"update"])->name("cart.update");
            Route::post("cart/remove",[\App\Http\Controllers\Carts\CartController::class,"destroy"])->name("cart.destroy");
            Route::post("cart/clear",[\App\Http\Controllers\Carts\CartController::class,"clear"])->name("cart.clear");
        });

        Route::resource('roles', spatie\RolesController::class);
        Route::resource('permissions', spatie\PermissionsController::class);
    });
});

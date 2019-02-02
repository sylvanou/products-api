<?php

use Illuminate\Http\Request;

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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

// List Products
Route::get('products', 'ProductController@index');

// List single product
Route::get('product/{id}', 'ProductController@show');

// Create new product
Route::post('product', 'ProductController@store');

// Update Product
Route::put('product', 'ProductController@store');

// Delete Product
Route::delete('product/{id}', 'ProductController@destroy');

//
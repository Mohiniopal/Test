<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

//Banner
Route::get('banner', 'App\Http\Controllers\Api\ApiController@banner');

//Client
Route::get('client', 'App\Http\Controllers\Api\ApiController@client');
Route::get('client/{slug}', 'App\Http\Controllers\Api\ApiController@client_detail');
Route::get('client2', 'App\Http\Controllers\Api\ApiController@client_detail2');
Route::get('home_client', 'App\Http\Controllers\Api\ApiController@home_client');

//exportclient 
Route::get('export_client', 'App\Http\Controllers\Api\ApiController@export_client');

//Certificate
Route::get('certificate', 'App\Http\Controllers\Api\ApiController@certificate');

//Gallery
Route::get('gallery', 'App\Http\Controllers\Api\ApiController@gallery');

//Infrastructure
Route::get('infrastructure', 'App\Http\Controllers\Api\ApiController@infrastructure');

//CMS
Route::get('cms', 'App\Http\Controllers\Api\ApiController@cms');
Route::get('cms/{slug}', 'App\Http\Controllers\Api\ApiController@cms_detail');

//Industry
Route::get('industry', 'App\Http\Controllers\Api\ApiController@industry');
Route::get('home_industry', 'App\Http\Controllers\Api\ApiController@home_industry');

//Product
Route::get('product', 'App\Http\Controllers\Api\ApiController@product');
Route::get('product/{slug}', 'App\Http\Controllers\Api\ApiController@product_detail');

//Conatct
Route::post('contact', 'App\Http\Controllers\Api\ApiController@contact');

//Inquiry
Route::post('inquiry', 'App\Http\Controllers\Api\ApiController@inquiry');

//Career
Route::post('apply_now', 'App\Http\Controllers\Api\ApiController@career');
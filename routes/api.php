<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\CategoriesController;
use App\Http\Controllers\Api\PostContoller;
use App\Http\Controllers\Api\UserController;
use App\Http\Controllers\DummyAPI;

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


Route::group(['middleware' => ['api','checkPassword','changeLanguage'], 'namspace' => 'Api'], function() {
    Route::post('get-main-category',[CategoriesController::class, 'index']);
    Route::get('data',[DummyAPI::class, 'index']);
    Route::get('users',[UserController::class, 'user']);
    Route::get('users/{id}',[UserController::class, 'userId']);
    Route::post('users/add',[UserController::class, 'userAdd']);
    Route::post('category/add',[CategoriesController::class, 'categoryAdd']);
    Route::put('category/update',[CategoriesController::class, 'categoryUpdate']);
    Route::get('posts', [PostContoller::class, 'index']);
    Route::post('posts/add', [PostContoller::class, 'add']);
    Route::put('posts/update', [PostContoller::class, 'update']);
    Route::delete('posts/delete/{id}',[PostContoller::class, 'delete']);
    Route::get('search/{name}',[PostContoller::class, 'search']);
});


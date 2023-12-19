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

Route::prefix('category')
    ->name('.category')
    ->controller(\App\Http\Controllers\BlogCategoryController::class)
    ->group(function (){
       Route::get('/','index')->name('.index');
       Route::get('/filter','filter')->name('.filter');
    });
Route::prefix('posts')
    ->name('.posts')
    ->controller(\App\Http\Controllers\BlogController::class)
    ->group(function (){
        Route::get('/','index')->name('.index');
        Route::get('/{id}/show','show')->name('.show');
        Route::get('/me','meBlogs')->name('.meBlogs')->middleware('api.auth');;
        Route::put('/{id}/update','update')->name('.update')->middleware('api.auth');
        Route::post('/','store')->name('.store')->middleware('api.auth');
        Route::delete('/{id}/delete','destroy')->name('.destroy')->middleware('api.auth');
    });


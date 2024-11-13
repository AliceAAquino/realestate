<?php
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginRegisterController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\LocationController;
use App\Http\Controllers\PropertyTypeController;
use App\Http\Controllers\PropertyController;
use App\Http\Controllers\HomeController;

// Route::get('/', function () {
//     return view('layouts');
// });
// Route::get('/', [HomeController::class, 'index']);


Route::controller(HomeController::class)->group(function() {   
    Route::get('/', 'index')->name('index');
    Route::get('/search', 'search')->name('search');
});

Route::controller(LoginRegisterController::class)->group(function() {   
    Route::get('/login', 'login')->name('login');
    Route::post('/authenticate', 'authenticate')->name('authenticate');
    Route::get('/dashboard', 'dashboard')->name('dashboard');
    Route::post('/logout', 'logout')->name('logout');
});
Route::resource('category', CategoryController::class);
Route::resource('location', LocationController::class);
Route::resource('property_type', PropertyTypeController::class);
Route::resource('property', PropertyController::class);
// Route::get("property/{id}",'HomeController@search')->name('property');

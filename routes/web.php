<?php

use Illuminate\Support\Facades\Auth;
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

Route::get('/', function () {
    $isAuth = Auth::check();
    if ($isAuth) {
      return  redirect('home');
    }
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/lack-of-knowledge', [App\Http\Controllers\HomeController::class, 'showLackOfKnowledge'])->name('lack-of-knowledge');
Route::get('/shops', [App\Http\Controllers\ShopController::class, 'getAllShopList'])->name('shops');
Route::post('/map-create', [App\Http\Controllers\MapController::class, 'createMap'])->name('map.create');
Route::post('/map-update', [App\Http\Controllers\MapController::class, 'updateMap'])->name('map.update');
Route::post('/shop-create', [App\Http\Controllers\ShopController::class, 'createNewShop'])->name('shop.create');
Route::post('/shop-update', [App\Http\Controllers\ShopController::class, 'editShop'])->name('shop.edit');

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
    return view('welcome');
});
Route::get('/products/upload', [App\Http\Controllers\ProductController::class, 'upload'])->name('upload');
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::resource('/products',"App\Http\Controllers\ProductController");
Route::POST('/products/export', [App\Http\Controllers\ProductController::class, 'export'])->name('export');
Route::POST('/products/import', [App\Http\Controllers\ProductController::class, 'import'])->name('import');




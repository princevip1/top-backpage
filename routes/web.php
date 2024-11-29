<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\BlogController;
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





Route::domain('{city}.backpage.ink')->group(function () {
  Route::get('/', [App\Http\Controllers\PublicPostController::class, 'categoriesCity'])->name("city");
});

Route::get('/', function () {
  return view('welcome');
})->name('home');

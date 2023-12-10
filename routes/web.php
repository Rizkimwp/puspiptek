<?php

use App\Http\Controllers\AboutController;
use App\Http\Controllers\ContactController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ShopController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route Login
Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::post('/actionLogin', [LoginController::class, 'actionLogin'])->name('actionLogin')->middleware('guest');

// Route Dashboard 
Route::get('/dashboard', [DashboardController::class, 'index'])->name('/')->middleware('auth', 'role:admin');


// route userview 

Route::get('/', [HomeController::class, 'index'])->name('/');
Route::get('/about', [AboutController::class, 'index'])->name('/about');
Route::get('/shop', [ShopController::class, 'index'])->name('/shop');
Route::get('/contact', [ContactController::class, 'index'])->name('/contact');
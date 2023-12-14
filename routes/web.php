<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ShopController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\BannerController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\BarangController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\KeranjangController;
use App\Http\Controllers\PenjualanController;


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
Route::post('/actionLogout', [LoginController::class, 'actionLogout'])->name('actionLogout')->middleware('auth', 'role:admin');;
Route::get('/actionLogout', [LoginController::class, 'actionLogout'])->name('logout');
// Route Dashboard 
Route::get('/dashboard', [DashboardController::class, 'index'])->name('/dashboard')->middleware('auth', 'role:admin');

Route::resource('produk', BarangController::class)->middleware('auth', 'role:admin');
Route::resource('kategori', KategoriController::class)->middleware('auth', 'role:admin');
// Route Penjualan 
Route::resource('penjualan', PenjualanController::class)->middleware('auth', 'role:admin');
Route::resource('admin', AdminController::class)->middleware('auth', 'role:admin');

Route::get('/pembayaran/checkout/', [CheckoutController::class, 'checkout'])->name('pembayaran.checkout')->middleware('auth', 'role:admin');

Route::resource('profile', ProfileController::class)->middleware('auth', 'role:admin');
Route::resource('banner', BannerController::class)->middleware('auth', 'role:admin');
// ->middleware('auth', 'role:admin');

// route userview 
Route::get('/', [HomeController::class, 'index'])->name('/');
Route::get('/keranjang', [KeranjangController::class, 'index'])->name('keranjang');
Route::get('/shop', [ShopController::class, 'index'])->name('shop');
Route::get('/kontak', [ContactController::class, 'index'])->name('contact');
Route::get('/showkategori/{id}', [ShopController::class, 'showCategori'])->name('showkategori');
// Add Card

Route::get('add-to-cart/{id}', [ShopController::class, 'addToCart'])->name('add');
Route::get('remove-from-cart', [ShopController::class, 'remove'])->name('remove');


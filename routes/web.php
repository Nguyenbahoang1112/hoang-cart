<?php

use App\Http\Controllers\Admin\BannerController;
use App\Http\Controllers\Admin\NewsController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\ProfileController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\User\HomesController;
use App\Http\Controllers\User\SlidersController;
use App\Http\Controllers\User\UserController;
use App\Http\Controllers\User\CartController;
use App\Http\Middleware\AdminAuth;
use Illuminate\Support\Facades\Route;

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

//User
Route::get('/login', [UserController::class, 'showLogin'])->name('show-login');
Route::post('/login', [UserController::class, 'login'])->name('login');
Route::get('/register', [UserController::class, 'showRegister'])->name('show-register');
Route::post('/register', [UserController::class, 'register'])->name('register');
Route::get('/logout', [UserController::class, 'logout'])->name('logout');

route::get('/', [HomesController::class, 'index'])->name('home')->middleware('auth');
//->middleware('auth')
//-------------------------------
//Admin
Route::get('/admin/login', [AdminController::class, 'showLogin'])->name('admin.show-login');
Route::post('/admin/login', [AdminController::class, 'login'])->name('admin.login');

Route::get('/admin/home', [AdminController::class, 'index'])->name('admin.home')->middleware('admin');
Route::resource('adminProfile', ProfileController::class);
Route::put('/adminProfile/updatePassword', [ProfileController::class, 'updatePassword'])->name('adminProfile.updatePassword');
Route::resource('adminProduct', ProductController::class)->middleware('admin');
Route::resource('adminNews', NewsController::class)->middleware('admin');
Route::resource('adminBanner', BannerController::class)->middleware('admin');
// Add to cart
Route::post('/cart/add', [CartController::class, 'addToCart'])->name('cart.add')->middleware('auth');
Route::get('/cart', [CartController::class, 'viewCart'])->name('cart.view')->middleware('auth');
Route::delete('/cart/remove', [CartController::class, 'removeFromCart'])->name('cart.remove')->middleware('auth');

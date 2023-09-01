<?php

use App\Models\Product;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\DetailController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\DashboardProductController;
use App\Http\Controllers\DashboardCategoryController;
use App\Http\Controllers\DashboardTransactionController;

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

Route::get('/login', [LoginController::class, 'index'])->middleware('guest')->name('login');

Route::post('/login', [LoginController::class, 'authenticate']);

Route::get('/register', [RegisterController::class, 'index'])->middleware('guest');

Route::post('/register', [RegisterController::class, 'store']);

Route::post('/logout', [LoginController::class, 'logout']);

/* Route::get('/stock/{slug}', [ProductController::class, 'show']);
 */
/* Route::get('/create-product', [DashboardProductController::class, 'create']); */

/* Route::post('/store-product', [DashboardProductController::class, 'store']); */

/* Route::get('/create-product', [DashboardProductController::class, 'create']); */

Route::middleware(['auth'])->group(function () {
    Route::get('/', function () { 
        return view('pages/dashboard');
    });
 
    Route::resource('product', DashboardProductController::class);
    
    Route::resource('category', DashboardCategoryController::class);
    
    Route::resource('transaction', DashboardTransactionController::class);

    Route::get('/detail/{id}', [DetailController::class, 'index'])->name('detail');

    Route::post('/detail/{id}', [App\Http\Controllers\DetailController::class, 'add'])->name('detail-add');

    Route::get('/cart', [App\Http\Controllers\CartController::class, 'index'])->name('cart');

    Route::delete('/cart/{id}', [App\Http\Controllers\CartController::class, 'delete'])->name('cart-delete');

});


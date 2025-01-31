<?php

use App\Http\Controllers\AdminDiscountController;
use App\Http\Controllers\AdminOrderController;
use App\Http\Controllers\AdminProductClassController;
use App\Http\Controllers\AdminProductController;
use App\Http\Controllers\AdminProductGroupController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductController;
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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::any('/', [ProductController::class, 'index'])->name('product.index');
Route::any('product/{id}', [ProductController::class, 'show'])->name('product.show');

Route::middleware(['auth'])->group(function () {
    // dashboard
    Route::get('dashboard', [HomeController::class, 'dashboard'])->name('dashboard');
    // Route::get('/', [ProductController::class, 'index'])->name('product.index')->route('welcome');


    Route::get('cart', [CartController::class, 'cartList'])->name('user.cart.list');
    Route::post('cart', [CartController::class, 'addToCart'])->name('user.cart.store');
    Route::post('update-cart', [CartController::class, 'updateCart'])->name('user.cart.update');
    Route::post('remove', [CartController::class, 'removeCart'])->name('user.cart.remove');

    Route::post('cart/useDiscount', [CartController::class, 'useDiscount'])->name('user.cart.useDiscount');
    Route::post('storeOrderFromCart', [CartController::class, 'storeOrderFromCart'])->name('order.store');
    Route::get('orders', [OrderController::class, 'index'])->name('user.order.index');
    Route::get('orders/{id}', [OrderController::class, 'show'])->name('user.order.show');

    // admin dashboard
    Route::prefix('admin')->name('admin.')->middleware('ensureUserRole:admin')->group(function () {
        Route::resource('product', AdminProductController::class);
        Route::resource('productClass', AdminProductClassController::class);
        Route::resource('productGroup', AdminProductGroupController::class);

        // admin discount
        Route::resource('discount', AdminDiscountController::class);
        Route::put('updateStatus', [AdminOrderController::class, 'updateStatus'])->name('order.updateStatus');
        Route::resource('order', AdminOrderController::class);
    });
});

require __DIR__ . '/auth.php';

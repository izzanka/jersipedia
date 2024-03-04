<?php

use App\Livewire\Auth\Login;
use App\Livewire\Auth\Register;
use App\Livewire\Cart\CartIndex;
use App\Livewire\Home;
use App\Livewire\Product\ProductDetail;
use App\Livewire\Product\ProductIndex;
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

Route::get('/home', function () {
    return redirect()->route('home');
});

Route::get('/', Home::class)->name('home');
Route::get('/products/{cond}', ProductIndex::class)->name('products.index');
Route::get('/products/{product:name_slug}/detail', ProductDetail::class)->name('products.detail');

Route::middleware('guest')->group(function () {
    Route::get('/login', Login::class)->name('login');
    Route::get('/register', Register::class)->name('register');
});

Route::middleware('auth')->group(function () {
    Route::get('/logout', function () {
        auth()->logout();

        return redirect()->route('home');
    });
    Route::get('/cart', CartIndex::class)->name('cart.index');
});

<?php
use Illuminate\Support\Facades\Route;

Route::get('/', App\Http\Livewire\Pages\Home\Index::class)->name('home');
Route::prefix('shop')->group(function() {
    Route::get('/category/{category:slug}', App\Http\Livewire\Pages\Shop\Index::class)
        ->name('shop.category');
    Route::get('/store/{store}', App\Http\Livewire\Pages\Shop\Index::class)
        ->name('shop.category');
});
Route::prefix('account')->group(function () {
    Route::get('/login', App\Http\Livewire\Pages\Login\Index::class)
        ->name('login');
    Route::middleware(['customer'])->group(function () {
        Route::get('', \App\Http\Livewire\Pages\Customer\Index::class);
        Route::get('/cart', App\Http\Livewire\Pages\Cart\Index::class)
            ->name('account.cart');
        Route::get('/checkout', App\Http\Livewire\Pages\Checkout\Index::class)
            ->name('account.checkout');

    });
});

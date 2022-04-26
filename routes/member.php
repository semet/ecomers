<?php
use Illuminate\Support\Facades\Route;

Route::get('/login', App\Http\Livewire\Member\Account\Login::class)
    ->middleware('guest:member')
    ->name('member.login');

Route::middleware('member')->group(function (){
    Route::get('', App\Http\Livewire\Member\Home\Index::class)
        ->name('member.home');

    Route::get('/product', App\Http\Livewire\Member\Product\Index::class)
        ->name('member.product');
});

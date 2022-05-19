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

    Route::get('/product/create', App\Http\Livewire\Member\CreateProduct\Index::class)
        ->name('member.product.create');

    Route::get('/product/{product}', App\Http\Livewire\Member\Product\Edit::class)
        ->name('member.product.edit');

    Route::post('/product/upload-images', [App\Http\Controllers\ProductImagesController::class, 'upload'])
        ->name('member.product.image-upload');

    Route::get('/product-sale', App\Http\Livewire\Member\Sale\Index::class)
        ->name('member.product.sale');

    Route::get('/product-runout', App\Http\Livewire\Member\RunoutProduct\Index::class)
        ->name('member.product.runout');
});

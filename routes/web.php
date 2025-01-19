<?php

use App\Livewire\MyOrders;
use App\Livewire\ViewOrder;
use Illuminate\Support\Facades\Route;

Route::get('/', App\Livewire\StoreFront::class)->name('home');
Route::get('/product/{productId}', \App\Livewire\Product::class)->name('product');
Route::get('/cart', \App\Livewire\Cart::class)->name('cart');


Route::get('/preview', function () {
    $order = \App\Models\Order::first();

    return new \App\Mail\OrderConfirmation($order);
});

Route::get('/my-orders', Myorders::class)->name('my-orders');




Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/checkout-status', \App\Livewire\CheckoutStatus::class)->name('checkout-status');

    Route::get('/order/{orderId}', ViewOrder::class)->name('view-order');
});

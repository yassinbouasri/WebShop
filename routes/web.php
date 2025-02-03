<?php

use App\Livewire\Cart;
use App\Livewire\CheckoutStatus;
use App\Livewire\MyOrders;
use App\Livewire\Product;
use App\Livewire\ViewOrder;
use App\Mail\AbandonedCartReminder;
use App\Mail\OrderConfirmation;
use Illuminate\Support\Facades\Route;

Route::get('/', App\Livewire\StoreFront::class)->name('home');
Route::get('/product/{productId}', Product::class)->name('product');
Route::get('/cart', Cart::class)->name('cart');


Route::get('/preview', function () {
    $order = auth()->user()->orders()->first();

    return new OrderConfirmation($order);
});

Route::get('/cart-reminder-preview', function () {
    $cart = auth()->user()->cart;

    return new AbandonedCartReminder($cart);
});


Route::middleware(['auth:sanctum', config('jetstream.auth_session'), 'verified',])->group(function () {
    Route::get('/checkout-status', CheckoutStatus::class)->name('checkout-status');

    Route::get('/order/{orderId}', ViewOrder::class)->name('view-order');
    Route::get('/my-orders', Myorders::class)->name('my-orders');

});

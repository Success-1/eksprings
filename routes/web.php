<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;

// Route::get('/', function () {
//     return view('welcome');
// });

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    // Route::get('/dashboard', function () {
    //     return view('dashboard');
    // })->name('dashboard');

    Route::get('/dashboard', [HomeController::class, 'dashboard'])->name('dashboard');
});

Route::get('/', [HomeController::class,'index']);

route::get('/redirect', [HomeController::class,'redirect'])->middleware('auth', 'verified');

// Redirect admin
route::get('/admin', [AdminController::class,'redirect_admin']); //->middleware('auth', 'verified');

route::get('/view_category', [AdminController::class,'view_category']);

Route::post('/add_category', [AdminController::class,'add_category']);

Route::get('/delete_category/{id}', [AdminController::class,'delete_category']);

Route::get('/view_products', [AdminController::class,'view_products']);

Route::post('/add_products', [AdminController::class,'add_products']);

Route::get('/show_products', [AdminController::class,'show_products'])->name('show_products');

Route::get('/delete_product/{id}', [AdminController::class,'delete_product']);

Route::get('/edit_product/{id}', [AdminController::class,'edit_product']);

Route::post('/edit_product_confirm/{id}', [AdminController::class,'edit_product_confirm']);

Route::get('/order', [AdminController::class,'order']);

Route::get('/delivered/{$id}', [AdminController::class,'delivered']);

// Admin search
Route::get('/search', [AdminController::class,'searchdata']);

Route::get('/product_details/{id}', [HomeController::class, 'product_details']);

Route::post('/add_cart/{id}', [HomeController::class,'add_cart']);

Route::get('/show_cart', [HomeController::class, 'show_cart']);

Route::get('/remove_cart/{id}', [HomeController::class, 'remove_cart']);

Route::get('/cash_order', [HomeController::class, 'cash_order']);

Route::get('/stripe/{totalprice}', [HomeController::class, 'stripe']);

Route::post('stripe', [HomeController::class, 'stripePost'])->name('stripe.post');

Route::get('/show_order', [HomeController::class,'show_order']);

Route::get('/cancel_order/{id}', [HomeController::class,'cancel_order']);

Route::get('/product_search', [HomeController::class,'product_search']);

Route::get('/products', [HomeController::class,'product']);

Route::get('/search_product', [HomeController::class,'search_product']);

Route::get('/about', [HomeController::class,'about']);

Route::get('/support', [HomeController::class,'support']);

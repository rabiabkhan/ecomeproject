<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;

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


Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

//  admin routes
Route::get('view_category', [AdminController::class, 'view_category'])->name('view_category');
Route::post('add_category', [AdminController::class, 'add_category'])->name('add_category');
Route::get('category-del/{id?}', [AdminController::class, 'dele_category'])->name('category-del');
Route::get('view_product', [AdminController::class, 'view_product'])->name('view_product');
Route::post('add_product', [AdminController::class, 'add_product'])->name('add_product');
Route::get('show_product', [AdminController::class, 'show_product'])->name('show_product');
Route::get('edit_product/{id}', [AdminController::class, 'edit_product'])->name('edit_product');
Route::post('product_update/{id?}', [AdminController::class, 'product_update'])->name('product_update');
Route::get('product_delete/{id?}', [AdminController::class, 'product_delete'])->name('product_delete');
Route::get('view_order', [AdminController::class, 'view_order'])->name('view_order');
Route::get('deliverd/{id?}', [AdminController::class, 'deliverd'])->name('deliverd');
Route::get('print_pdf/{id?}', [AdminController::class, 'print_pdf'])->name('print_pdf');
Route::get('send_email/{id?}', [AdminController::class, 'send_email'])->name('send_email');
Route::post('user_send_email/{id?}', [AdminController::class, 'user_send_email'])->name('user_send_email');
Route::post('search', [AdminController::class, 'search'])->name('search');
// user routes
Route::get('product_details/{id?}', [HomeController::class, 'product_details'])->name('product_details');
Route::post('add_cart/{id?}', [HomeController::class, 'add_cart'])->name('add_cart');
Route::get('show_cart', [HomeController::class, 'show_cart'])->name('show_cart');
Route::get('remove_cart/{id?}', [HomeController::class, 'remove_cart'])->name('remove_cart');
Route::get('cash_order', [HomeController::class, 'cash_order'])->name('cash_order');
Route::get('stripe/{totalprice}', [HomeController::class, 'stripe'])->name('stripe');
Route::post('stripe/{totalprice}',  [HomeController::class, 'stripePost'])->name('stripe.post');
Route::get('/', [HomeController::class, 'index']);
Route::get('/redirect', [HomeController::class, 'redirect'])->middleware('auth', 'verified');
Route::get('/show_order', [HomeController::class, 'show_order'])->name('show_order');
Route::get('/cancel_order/{id}', [HomeController::class, 'cancel_order'])->name('cancel_order');
Route::post('/add_comment', [HomeController::class, 'add_comment'])->name('add_comment');
Route::post('/comment_reply', [HomeController::class, 'comment_reply'])->name('comment_reply');
Route::get('product_search', [HomeController::class, 'product_search'])->name('product_search');
Route::get('products', [HomeController::class, 'products'])->name('products');
Route::get('search_product', [HomeController::class, 'search_product'])->name('search_product');

<?php

use App\Http\Controllers\Backend\AdminController;
use App\Http\Controllers\Frontend\DashboardController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\pieController;
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

// ! User frontend Controller
// Route::get('/dashboard', [DashboardController::class, 'index']);
Route::get('/', [DashboardController::class, 'index']);
Route::get('/show_cart', [DashboardController::class, 'show_cart']);
Route::get('/product_details/{id}', [DashboardController::class, 'product_details']);
Route::post('/add_cart/{id}', [DashboardController::class, 'add_cart']);
Route::get('/show_carts', [DashboardController::class, 'show_carts']);
Route::get('/show_carts/{id}', [DashboardController::class, 'remove_cart']);
Route::get('/delete_products/{id}', [AdminController::class, 'delete_products']);
Route::get('/cash_order', [DashboardController::class, 'cash_order']);
Route::get('/stripe/{totalprice}', [DashboardController::class, 'stripe']);
Route::get('/show_order', [DashboardController::class, 'show_order']);
Route::get('/cancel_order/{id}', [DashboardController::class, 'cancel_order']);



// Stripe
Route::get('/stripe', [DashboardController::class, 'stripe']);
Route::post('/stripePost', [DashboardController::class, 'stripePost'])->name('stripe.post');

// Socialite
Route::get('login/github', [LoginController::class, 'github'])->name('github.login');
Route::get('login/github/callback', [LoginController::class, 'callback']);



// ! Admin Controller
Route::middleware(['auth'])->group(function () {
    // Route::get('/redirect', [AdminController::class, 'redirect']);

    Route::get('/dashboard', [AdminController::class, 'redirect']);
    Route::get('/dashboard', [AdminController::class, 'index']);
    Route::get('/view_category', [AdminController::class, 'view_category']);
    Route::post('/add_category', [AdminController::class, 'add_category']);
    Route::get('/delete_category/{id}', [AdminController::class, 'delete_category']);
    Route::get('/view_products', [AdminController::class, 'view_products']);
    Route::post('/add_products', [AdminController::class, 'add_products']);
    Route::get('/show_products', [AdminController::class, 'show_products']);
    Route::get('/delete_products/{id}', [AdminController::class, 'delete_products']);
    Route::get('/edit_products/{id}', [AdminController::class, 'edit_products']);
    Route::post('/update_products/{id}', [AdminController::class, 'update_products']);
    Route::get('/order', [AdminController::class, 'order']);
    Route::get('/delivered/{id}', [AdminController::class, 'delivered']);
    Route::get('/print_pdf/{id}', [AdminController::class, 'print_pdf']);
    Route::get('/send_email/{id}', [AdminController::class, 'send_email']);
    Route::post('/send_user_email/{id}', [AdminController::class, 'send_user_email']);
    Route::get('/searchdata', [AdminController::class, 'searchdata']);
    Route::get('/eloquent', [AdminController::class, 'eloquent']);
});

Route::get('/pie', [pieController::class, 'index']);


// Route::get('/', function () {
//     return view('/dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');



require __DIR__ . '/auth.php';

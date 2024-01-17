<?php

use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\OrderController;
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



// Route::middleware([
//     'auth:sanctum',
//     config('jetstream.auth_session'),
//     'verified',
// ])->group(function () {
//     Route::get('/dashboard', function () {
//         return view('dashboard');
//     })->name('dashboard');
// });


/**all the routes for front or landing page */
Route::get('/', function () {
  return view('home.welcome');
});

Route::get('/home', [HomeController::class, 'index'])->middleware('auth')->name('home');

Route::get('/services', [HomeController::class, 'services'])->name('services.index');
Route::get('/aboutus', [HomeController::class, 'aboutus'])->name('aboutus.index');
Route::get('/contactus', [HomeController::class, 'contact'])->name('contact.index');










Route::middleware(['customer', 'auth'])->group(function () {
  Route::get('/orders', [UserController::class, 'userorders'])->name('user.orderhistory');
  Route::post('/cart/add/{productId}', [CartController::class, 'addToCart'])->name('cart.add');
  Route::get('/cart', [CartController::class, 'show_cart_product'])->name('cart.show');
  Route::patch('/cart/update/{productId}', [CartController::class, 'update'])->name('cart.update');
  Route::delete('/cart/{productId}', [CartController::class, 'removeFromCart'])->name('cart.remove');
  Route::post('/checkout', [OrderController::class, 'checkout'])->name('checkout');
});






Route::middleware(['seller', 'auth'])->group(function () {
  // Landing page for seller's products
  Route::get('/product', [ProductController::class, 'seller_product_landing'])->name('product.index');

  // Order list for seller's products
  Route::get('/orderlist', [ProductController::class, 'orderList'])->name('product.order');

  // Add product form
  Route::get('/product/addproduct', [ProductController::class, 'seller_product_add'])->name('product.add');

  // Store new product
  Route::post('/product', [ProductController::class, 'add_product'])->name('product.store');

  // Edit product form
  Route::get('/product/{product}/edit', [ProductController::class, 'edit_products'])->name('product.edit');

  // Update product
  Route::put('/product/{product}/update', [ProductController::class, 'update_products'])->name('product.update');

  // Delete product
  Route::delete('/product/{product}/destroy', [ProductController::class, 'delete_products'])->name('product.delete');
});






Route::middleware(['auth', 'admin'])->group(function () {
  Route::get('/usermanagement', [AdminController::class, 'usermgm'])->name('user.mgm');
  Route::get('/productmanagement', [AdminController::class, 'productmgm'])->name('product.mgm');

  Route::get('/usermanagement/approve/{user}', [AdminController::class, 'approveUser'])->name('admin.approve.user');
  Route::get('/usermanagement/decline/{user}', [AdminController::class, 'declineUser'])->name('admin.decline.user');

  Route::get('/productmanagement/approve/{product}', [AdminController::class, 'approveProduct'])->name('admin.approve.product');
  Route::get('/productmanagement/decline/{product}', [AdminController::class, 'declineProduct'])->name('admin.decline.product');
});
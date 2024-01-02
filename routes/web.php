<?php

use App\Http\Controllers\ProductController;
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



Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});




/**all the routes for front or landing page */
Route::get('/', function () { return view('welcome');});
Route::get('/services', [ProductController::class, 'services'])->name('services.index');
Route::get('/aboutus', [ProductController::class, 'aboutus'])->name('aboutus.index');
Route::get('/contactus', [ProductController::class, 'contact'])->name('contact.index');


/**all the routes for user/customer */
Route::get('/userdashboard',[ProductController::class,'userdashboard'])->name('userdashboard.index');


/**all the routes for products crud and displaying pages */
Route::get('/allproducts', [ProductController::class, 'all_product_landing'])->name('allproduct.index');
Route::get('/product', [ProductController::class, 'seller_product_landing'])->name('product.index');
Route::get('/product/addproduct', [ProductController::class, 'seller_product_add'])->name('product.add');
Route::post('/product', [ProductController::class, 'add_product'])->name('product.store');
Route::get('/product/{product}/edit', [ProductController::class, 'edit_products'])->name('product.edit');
Route::put('/product/{product}/update', [ProductController::class, 'update_products'])->name('product.update');
Route::delete('/product/{product}/destroy', [ProductController::class, 'delete_products'])->name('product.delete');
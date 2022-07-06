<?php

use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;

require __DIR__ . '/auth.php';

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

Route::get('/', function () {
    return view('auth.login');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

Route::middleware([
    'auth',
])->group(function () {
    Route::get('/products', [ProductController::class, 'indexPage'])->name('products.page.index');
    Route::get('/products-create', [ProductController::class, 'createPage'])->name('products.page.create');
    Route::get('/products-edit/{id}', [ProductController::class, 'editPage'])->name('products.page.edit');
    Route::get('/products-edit-stock/{id}', [ProductController::class, 'editStockPage'])->name('products.page.edit-stock');
    Route::post('/products-store', [ProductController::class, 'storeProduct'])->name('products.store');
    Route::post('/products-update', [ProductController::class, 'updateProduct'])->name('products.update');
    Route::post('/products-update-stock', [ProductController::class, 'updateProductStock'])->name('products.update-stock');
    Route::post('/products-delete', [ProductController::class, 'deleteProduct'])->name('products.delete');
});

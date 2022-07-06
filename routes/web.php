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
    Route::get('/products-edit', [ProductController::class, 'editPage'])->name('products.page.edit');
    Route::post('/products-store', [ProductController::class, 'storeProduct'])->name('products.page.store');
    Route::post('/products-update', [ProductController::class, 'updateProduct'])->name('products.update');
    Route::post('/products-delete', [ProductController::class, 'deleteProduct'])->name('products.delete');
});

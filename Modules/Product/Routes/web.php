<?php

use Modules\Product\Http\Controllers\ProductController;

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

Route::group(['prefix' => 'produtos'], function () {
    Route::get('/', [ProductController::class, 'index'])->name('produtos.index');
    Route::get('/cadastrar', [ProductController::class, 'create'])->name('produtos.create');
    Route::post('/registrar', [ProductController::class, 'store'])->name('produtos.store');
    Route::get('/ver/{id}', [ProductController::class, 'show'])->name('produtos.show');
    Route::get('/editar/{id}', [ProductController::class, 'edit'])->name('produtos.edit');
    Route::put('/alterar/{id}', [ProductController::class, 'update'])->name('produtos.update');
    Route::delete('/excluir/{id}', [ProductController::class, 'destroy'])->name('produtos.destroy');
});

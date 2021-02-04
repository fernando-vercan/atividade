<?php

use Modules\Category\Http\Controllers\CategoryController;

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

Route::group(['prefix' => 'categorias'], function () {
    Route::get('/', [CategoryController::class, 'index'])->name('categorias.index');
    Route::get('/cadastrar', [CategoryController::class, 'create'])->name('categorias.create');
    Route::post('/registrar', [CategoryController::class, 'store'])->name('categorias.store');
    Route::get('/ver/{id}', [CategoryController::class, 'show'])->name('categorias.show');
    Route::get('/editar/{id}', [CategoryController::class, 'edit'])->name('categorias.edit');
    Route::put('/alterar/{id}', [CategoryController::class, 'update'])->name('categorias.update');
    Route::delete('/excluir/{id}', [CategoryController::class, 'destroy'])->name('categorias.destroy');
});

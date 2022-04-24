<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

use App\Http\Controllers\ProductController;

Route::get('/', [ProductController::class, 'index'])->name('product.index');

Route::prefix('product')->group(function () {
    //list
    Route::get('/', [ProductController::class, 'index'])->name('product.index');
    //add
    Route::post('/create', [ProductController::class, 'create'])->name('product.create');
    //info
    Route::get('/find/{id}', [ProductController::class, 'find'])->name('product.find');
    //update
    Route::get('/find_update/{id}', [ProductController::class, 'find_update'])->name('product.find_delete');
    Route::post('/update', [ProductController::class, 'update'])->name('product.update');
    //delete
    Route::get('/find_delete/{id}', [ProductController::class, 'find_delete'])->name('product.find_delete');
    Route::post('/delete', [ProductController::class, 'delete'])->name('product.delete');
});



use App\Http\Controllers\BarangController;

Route::get('/', [BarangController::class, 'index'])->name('barang.index');

Route::prefix('barang')->group(function () {
    //list
    Route::get('/', [BarangController::class, 'index'])->name('barang.index');
    //add
    Route::post('/create', [BarangController::class, 'create'])->name('barang.create');
    //info
    Route::get('/find/{id}', [BarangController::class, 'find'])->name('barang.find');
    //update
    Route::get('/find_update/{id}', [BarangController::class, 'find_update'])->name('barang.find_delete');
    Route::post('/update', [BarangController::class, 'update'])->name('barang.update');
    //delete
    Route::get('/find_delete/{id}', [BarangController::class, 'find_delete'])->name('barang.find_delete');
    Route::post('/delete', [BarangController::class, 'delete'])->name('barang.delete');

    //dataTables
    Route::get('/data', [BarangController::class, 'dataTables'])->name('barang.data');
});

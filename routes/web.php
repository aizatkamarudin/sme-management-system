<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\InventoryController;
use App\Http\Controllers\BrandController;
use App\Http\Controllers\TypeDeviceController;
Route::get('/', function () {
    return view('home');
});

Route::resource('inventory', InventoryController::class);
Route::resource('brand', BrandController::class);
Route::resource('typeDevice', TypeDeviceController::class);
Route::post('/inventory/update/{id}', [InventoryController::class, 'update'])->name('inventory.update');
<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\InventoryController;

Route::get('/', function () {
    return view('home');
});

Route::resource('inventory', InventoryController::class);
Route::post('/inventory/update/{id}', [InventoryController::class, 'update'])->name('inventory.update');
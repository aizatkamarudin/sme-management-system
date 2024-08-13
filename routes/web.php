<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\InventoryController;

Route::get('/', function () {
    return view('home');
});

// Route::get('/inventory/list', function () {
//     return view('inventory.list');
// })->name('inventory.list');
Route::resource('inventory', InventoryController::class);
// Route::view('inventory/list', 'inventory.list');
// Route::get('/', [KanbanController::class, 'index'])->name('kanban.index');
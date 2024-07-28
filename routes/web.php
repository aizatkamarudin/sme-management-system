<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
});

Route::get('/inventory/list', function () {
    return view('inventory.list');
})->name('inventory.list');
// Route::view('inventory/list', 'inventory.list');
// Route::get('/', [KanbanController::class, 'index'])->name('kanban.index');
<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\StatusController;
use App\Http\Controllers\Task\TaskController;
use App\Http\Controllers\Task\TaskFilterController;
use App\Http\Controllers\TasksController;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('task_statuses', [StatusController::class, 'index'])
    ->name('statuses');
Route::get('task_statuses/create', [StatusController::class, 'create'])
    ->name('status.create');
Route::post('task_statuses/create', [StatusController::class, 'store'])
    ->name('status.store');

Route::get('task_statuses/{id}', [StatusController::class, 'destroy'])
    ->name('status.destroy');
Route::patch('task_statuses/{id}', [StatusController::class, 'update'])
    ->name('status.update');

Route::get('task_statuses/{id}/edit', [StatusController::class, 'edit'])
    ->name('status.edit');
Route::post('task_statuses/{id}/edit', [StatusController::class, 'edit'])
    ->name('status.edit');


Route::get('tasks', [TasksController::class, 'index'])
    ->name('tasks');


Route::get('tasks/{id}', [TaskController::class, 'index'])
    ->name('task');
Route::get('tasks/create', [TaskController::class, 'create'])
    ->name('task.create');
Route::post('tasks/create', [StatusController::class, 'store'])
    ->name('task.store');


require __DIR__.'/auth.php';

<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\StatusController;
use App\Http\Controllers\Task\TaskController;
use App\Http\Controllers\Task\TaskFilterController;
use App\Http\Controllers\TasksController;
use App\Models\Task;
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

Route::get('task/{id}', [TasksController::class, 'destroy'])
    ->name('task.destroy');


Route::get('tasks/create', [TasksController::class, 'create'])
    ->name('task.create');
Route::post('tasks/create', [TasksController::class, 'store'])
    ->name('task.store');


Route::get('tasks/{id}', [TasksController::class, 'show'])
    ->name('task');


require __DIR__.'/auth.php';

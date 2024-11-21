<?php

use App\Http\Controllers\LabelsController;
use App\Http\Controllers\StatusController;
use App\Http\Controllers\TasksController;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('welcome');
});

Route::get('task_statuses', [StatusController::class, 'index'])
    ->name('statuses');
Route::post('task_statuses', [StatusController::class, 'store'])
    ->name('status.store');
Route::get('task_statuses/create', [StatusController::class, 'create'])
    ->name('status.create');


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
Route::get('tasks/create', [TasksController::class, 'create'])
    ->name('task.create');
Route::post('tasks/create', [TasksController::class, 'store'])
    ->name('task.store');

Route::get('task/{id}', [TasksController::class, 'destroy'])
    ->name('task.destroy');
Route::patch('tasks/{id}', [TasksController::class, 'update'])
    ->name('task.update');

Route::get('tasks/{id}', [TasksController::class, 'show'])
    ->name('task');

Route::get('tasks/{id}/edit', [TasksController::class, 'edit'])
    ->name('task.edit');
Route::post('tasks/{id}/edit', [TasksController::class, 'edit'])
    ->name('task.edit');


Route::get('labels', [LabelsController::class, 'index'])
    ->name('labels');
Route::post('labels', [LabelsController::class, 'store'])
    ->name('label.store');
Route::get('labels/create', [LabelsController::class, 'create'])
    ->name('label.create');


Route::patch('label/{id}', [LabelsController::class, 'update'])
    ->name('label.update');

Route::get('labels/{id}/edit', [LabelsController::class, 'edit'])
    ->name('label.edit');
Route::post('labels/{id}/edit', [LabelsController::class, 'edit'])
    ->name('label.edit');

Route::get('label/{id}', [LabelsController::class, 'destroy'])
    ->name('label.destroy');

require __DIR__.'/auth.php';

<?php

use App\Http\Controllers\LabelsController;
use App\Http\Controllers\StatusController;
use App\Http\Controllers\TasksController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('task_statuses', [StatusController::class, 'index'])
    ->name('statuses.index');
Route::post('task_statuses', [StatusController::class, 'store'])
    ->name('statuses.store');
Route::get('task_statuses/create', [StatusController::class, 'create'])
    ->name('statuses.create');
Route::get('task_statuses/{id}/edit', [StatusController::class, 'edit'])
    ->name('statuses.edit');
Route::patch('task_statuses/{id}', [StatusController::class, 'update'])
    ->name('statuses.update');
Route::get('task_statuses/{id}/delete', [StatusController::class, 'destroy'])
    ->name('statuses.destroy');


Route::get('tasks', [TasksController::class, 'index'])
    ->name('tasks.index');
Route::post('tasks', [TasksController::class, 'store'])
    ->name('tasks.store');
Route::get('tasks/create', [TasksController::class, 'create'])
    ->name('tasks.create');
Route::get('tasks/{id}', [TasksController::class, 'show'])
    ->name('tasks.show');
Route::get('tasks/{id}/edit', [TasksController::class, 'edit'])
    ->name('tasks.edit');
Route::patch('tasks/{id}', [TasksController::class, 'update'])
    ->name('tasks.update');
Route::get('tasks/{id}/delete', [TasksController::class, 'destroy'])
    ->name('tasks.destroy');


Route::get('labels', [LabelsController::class, 'index'])
    ->name('labels.index');
Route::post('labels', [LabelsController::class, 'store'])
    ->name('labels.store');
Route::get('labels/create', [LabelsController::class, 'create'])
    ->name('labels.create');
Route::get('labels/{id}/edit', [LabelsController::class, 'edit'])
    ->name('labels.edit');
Route::patch('labels/{id}', [LabelsController::class, 'update'])
    ->name('labels.update');
Route::get('labels/{id}/delete', [LabelsController::class, 'destroy'])
    ->name('labels.destroy');

require __DIR__ . '/auth.php';

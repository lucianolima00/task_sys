<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::middleware('auth')->group(function () {
    Route::middleware('admin')->group(function () {
        Route::resource('users', UserController::class, ['except' => ['show', 'update', 'destroy']]);
        Route::any('/users/{user}/update', [UserController::class, 'update'])->name('users.update');
        Route::any('/users/{user}/delete', [UserController::class, 'destroy'])->name('users.destroy');
    });

    Route::get('/tasks/data', [TaskController::class, 'data'])->name('tasks.data');
    Route::get('/tasks/projects', [TaskController::class, 'projects'])->name('tasks.projects');
    Route::post('/tasks/reorder', [TaskController::class, 'reorder'])->name('tasks.reorder');
    Route::resource('tasks', TaskController::class, ['except' => ['show']]);

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::resource('projects', ProjectController::class, ['except' => ['show']]);

    Route::get('/', function () {
        return view('dashboard');
    });
});

require __DIR__.'/auth.php';

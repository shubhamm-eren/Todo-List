<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TaskController;
use App\Models\Task;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/todo', [TaskController::class,'index']);
Route::post('/add', [TaskController::class,'add']);
Route::get('/todo/delete/{id}', [TaskController::class,'destroy'])->name('task.delete');
Route::get('/todo/edit/{id}', [TaskController::class,'edit'])->name('task.edit');
Route::post('/todo/update/{id}', [TaskController::class,'update'])->name('task.update');

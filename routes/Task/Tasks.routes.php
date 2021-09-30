<?php

use App\Http\Controllers\Task\TaskController;

use Illuminate\Support\Facades\Route;

Route::post('index', [TaskController::class, 'index']);
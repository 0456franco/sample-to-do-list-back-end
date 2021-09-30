<?php

use App\Http\Controllers\Project\ProjectController;

use Illuminate\Support\Facades\Route;

Route::post('show', [ProjectController::class, 'show']);

Route::get('index', [ProjectController::class, 'index']);
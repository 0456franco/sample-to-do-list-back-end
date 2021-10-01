<?php

use App\Http\Controllers\User\UserController;

use Illuminate\Support\Facades\Route;

Route::post('show',     [UserController::class, 'show']);
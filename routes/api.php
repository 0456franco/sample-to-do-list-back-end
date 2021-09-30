<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::prefix('user')                       ->group(__DIR__ . '/User/User.routes.php');

Route::prefix('project')                    ->group(__DIR__ . '/Project/Project.routes.php');

Route::prefix('task')                       ->group(__DIR__ . '/Task/Tasks.routes.php');
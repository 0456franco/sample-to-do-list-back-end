<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;

use App\Models\User;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function getUserTasks(User $user, Request $request){
        
        return $user->getUserTasks($request);

    }

}   

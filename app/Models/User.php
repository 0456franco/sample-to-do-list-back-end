<?php

namespace App\Models;

use Auth;
use Mail;

use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Notifications\Notifiable;

use Illuminate\Foundation\Auth\User as Authenticatable;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Password as IlluminatePassword;
use Illuminate\Support\Str;

use Tymon\JWTAuth\Contracts\JWTSubject;

use App\Rules\Username;

class User extends Authenticatable implements JWTSubject
{
    
    use Notifiable, HasFactory, SoftDeletes;  

    /**
     * Get the identifier that will be stored in the subject claim of the JWT.
     *
     * @return mixed
     */
    public function getJWTIdentifier()
    {
        return $this->getKey();
    }

    /**
     * Return a key value array, containing any custom claims to be added to the JWT.
     *
     * @return array
     */
    public function getJWTCustomClaims()
    {
        return [];
    }

    /**
     * Refresh a token.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function refresh()
    {
        return $this->respondWithToken(Auth::refresh());
    }

    /**
     * Get the token array structure.
     *
     * @param  string $token
     *
     * @return \Illuminate\Http\JsonResponse
     */
    protected function respondWithToken($token)
    {
        return response()->json([
            'access_token' => $token,
            'token_type' => 'bearer',
            'expires_in' => Auth::factory()->getTTL() * 60
        ]);
    }

    public function tasks(){
        return $this->hasMany('App\Models\Task', 'user_id');
    }

    public function projects(){
        return $this->belongsToMany('App\Models\Project', 'project_pivot', 'user_id', 'id');
    }

    public function getUserTasks(Request $request){

        $validatedData = $request->validate([
            'slug' => ['string', 'required']
        ]);

        $user = User::select('id', 'username', 'slug')->where('slug', $validatedData['slug'])->get()[0];

        $taskList = Task::select('*')->where('user_id', $user->id)->get();

        foreach ($taskList as $task) {
            $task->project = Project::select('*')->where('id', $task->project_id)->get()[0];
        }

        return response([
            'success' => true,
            'task_list' => $taskList,
            'user' => $user
        ]);

    }
 
}

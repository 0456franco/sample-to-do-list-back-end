<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\User;

class UsersTest extends TestCase
{

    public function test_show()
    {

        //Get a random slug from the database
        $response = $this->post('/api/user/show', [
            'slug' => $slug
        ]);

        $response->assertStatus(200);
    
    }

}

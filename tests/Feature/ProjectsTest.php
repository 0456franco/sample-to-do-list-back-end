<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
Use App\Models\Project;

class ProjectsTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_index()
    {
        $response = $this->get('/api/project/index');

        $response->assertStatus(200);
    }
    
    public function test_show()
    {

        //Get a random slug from the database

        $slug = Project::select('slug')->inRandomOrder()->get()[0]->slug;

        $response = $this->post('/api/project/show', [
            'slug' => $slug
        ]);

        $response->assertStatus(200);
    
    }
    
}

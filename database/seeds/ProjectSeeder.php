<?php

use Illuminate\Database\Seeder;

use App\Models\Project;
use App\Models\User;


class ProjectSeeder extends Seeder
{
    
    public function run()
    {

        $projects = Project::factory()
        ->hasTasks(5)
        ->count(5)
        ->create();

        $projectIdList = Project::select('id')->inRandomOrder()->get();

        $users = User::inRandomOrder()->get();

        foreach ($users as $user) {            

            $user->projects()->attach($projectIdList);            


        }

    }

}

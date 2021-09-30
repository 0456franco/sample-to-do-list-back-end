<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Database\Factories\UserFactory;

use App\Models\User;
use App\Models\SpotbieUser;
use App\Models\Friendship;
use App\Models\ContactMe;

// composer require laracasts/testdummy
use Laracasts\TestDummy\Factory as TestDummy;

class UserSeeder extends Seeder
{
    public function run()
    {
        User::factory()
        ->count(5)
        ->create();
    }
}

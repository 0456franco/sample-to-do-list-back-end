<?php

namespace Database\Factories;

use App\Models\Project;
use App\Models\User;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

use Database\Factories\UserFactory;

class ProjectFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Project::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $projectName = $this->faker->unique()->realText(25);
        $slug = UserFactory::slugify($projectName);
        $userId = User::inRandomOrder()->first()->id;
        return [
            'user_id' => $userId,
            'uuid' => Str::uuid(),
            'name' => $projectName,
            'slug' => $slug,
        ];
    }



}

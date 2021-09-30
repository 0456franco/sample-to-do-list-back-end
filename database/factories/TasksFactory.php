<?php

namespace Database\Factories;

use App\Models\Project;
use App\Models\Task;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class TaskFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Task::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $taskName = $this->faker->unique()->name();

        $project_id = Project::inRandomOrder()->first()->id;
        
        return [
            'project_id' => $project_id,
            'user_id' => User::inRandomOrder()->first()->id,
            'name' => $this->faker->realText(50),
            'estimated_hours' => $this->faker->numberBetween(0, 10)
        ];
    }
}

<?php

namespace Database\Factories;

use App\Models\Task;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class TaskFactory extends Factory
{
    protected $model = Task::class;

    public function definition()
    {
        return [
            'description' => $this->faker->text,
            'user_id' => $this->faker->randomDigit,
            'id' => $this->faker->randomDigit,
        ];
    }
}

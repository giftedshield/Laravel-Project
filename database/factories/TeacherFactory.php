<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Subject;

class TeacherFactory extends Factory
{
    public function definition(): array
    {
        return [
            'name' => $this->faker->name(),
            'subject_id' => Subject::factory(),
            'phone' => '08' . $this->faker->numerify('##########'),
            'email' => $this->faker->unique()->safeEmail(),
            'address' => $this->faker->address(),
        ];
    }
}
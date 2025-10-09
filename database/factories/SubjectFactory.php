<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class SubjectFactory extends Factory
{
    public function definition(): array
    {
        static $subjects = [
            ['name' => 'matematika', 'description' => 'nomor'],
            ['name' => 'bahasa Indonesia', 'description' => 'indo'],
            ['name' => 'fisika', 'description' => 'nomor pangkat'],
            ['name' => 'kimia', 'description' => 'breaking bad'],
            ['name' => 'sejarah', 'description' => 'war'],
        ];
        $data = array_shift($subjects);
        return $data ?? [
            'name' => $this->faker->unique()->word(),
            'description' => $this->faker->sentence(),
        ];
    }
}
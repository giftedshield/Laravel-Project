<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Classroom; 

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Student>
 */
class StudentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            //tuliskan semua kolo sesuai dengan kolom table students
            //isian data fake bisa refer ke https://fakerphp.org/
            //penulisan nama kolom harus sama persis dengan kolom pada tabel
            //untuk grade memakai faker randomElement(['11 PPLG 1', '10 PPLG1',etc])
            'name'      => fake()->name(),
            'birthday'  => fake()->date(),
            'gender'    => fake()->randomElement(['Laki-laki', 'Perempuan']),
            'classroom_id'     => Classroom::factory(),
            'email'     => fake()->unique()->safeEmail(),
            'address'   => fake()->address(),
        ];
    }
}

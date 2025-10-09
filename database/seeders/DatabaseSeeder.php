<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Student;
use App\Models\Guardian;
use App\Models\Classroom;
use App\Models\Teacher;
use App\Models\Subject;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        // Student::factory(15)->create();
        Guardian::factory(15)->create();
        Classroom::factory(4)
            ->hasStudents(5)
            ->create(); 

        $subjects = Subject::factory(5)->create();

        foreach ($subjects as $subject) {
            Teacher::factory()->create([
                'subject_id' => $subject->id,
            ]);
        }

        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);
    }
}

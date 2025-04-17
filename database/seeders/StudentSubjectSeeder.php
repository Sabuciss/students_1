<?php

namespace Database\Seeders;

use App\Models\Student;
use App\Models\Subject;
use Illuminate\Database\Seeder;

class StudentSubjectSeeder extends Seeder
{
    public function run()
    {
        // Piesaistām random priekšmetus studentiem
        $students = Student::all();
        $subjects = Subject::all();

        foreach ($students as $student) {
            // Izvēlam random priekšmetus studentam
            $randomSubjects = $subjects->random(rand(1, 2));  // Katram studentam piesaistām 1-2 priekšmetus
            $student->subjects()->attach($randomSubjects);
        }
    }
}

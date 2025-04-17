<?php

namespace Database\Seeders;

use App\Models\Student;
use Illuminate\Database\Seeder;

class StudentSeeder extends Seeder
{
    public function run()
    {
        // Izveidojam 14 random studentus
        \App\Models\Student::factory(14)->create();
    }
}

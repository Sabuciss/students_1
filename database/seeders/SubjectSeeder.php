<?php

namespace Database\Seeders;

use App\Models\Subject;
use Illuminate\Database\Seeder;

class SubjectSeeder extends Seeder
{
    public function run()
    {
        // Pievienojam dažus priekšmetus
        Subject::create(['subject_name' => 'Matemātika']);
        Subject::create(['subject_name' => 'Angļu valoda']);
    }
}

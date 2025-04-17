<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        // Izsaucam visas seedu funkcijas
        $this->call([
            SubjectSeeder::class,
            StudentSeeder::class,
            StudentSubjectSeeder::class,
        ]);
    }
}
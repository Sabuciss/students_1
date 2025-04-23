<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
// Lai pievienotu tikai 'role' kolonnu (nevis 'name')
public function up()
{
    Schema::table('users', function (Blueprint $table) {
        if (!Schema::hasColumn('users', 'role')) {  // Pārliecinieties, ka 'role' kolonna jau nav
            $table->enum('role', ['student', 'teacher'])->default('student');
        }
    });
}

public function down(): void
{
    Schema::table('users', function (Blueprint $table) {
        if (Schema::hasColumn('users', 'role')) {  // Dzēst tikai tad, ja 'role' kolonna ir pievienota
            $table->dropColumn('role');
        }
    });
}

};

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGradesTable extends Migration
{
    public function up()
    {
        Schema::create('grades', function (Blueprint $table) {
            $table->id();
            $table->foreignId('student_id')->constrained()->onDelete('cascade');  // Ārējā atslēga uz students tabulu
            $table->foreignId('subject_id')->constrained()->onDelete('cascade');  // Ārējā atslēga uz subjects tabulu
            $table->integer('grade');  // Atzīme
            $table->timestamps();  // Pievieno created_at un updated_at
        });
    }

    public function down()
    {
        Schema::dropIfExists('grades');
    }
}

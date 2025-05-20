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
    $table->unsignedBigInteger('student_id');
    $table->unsignedBigInteger('subject_id');
    $table->integer('grade');
    $table->timestamp('graded_at')->useCurrent();

    $table->foreign('student_id')->references('id')->on('students')->onDelete('cascade');
    $table->foreign('subject_id')->references('id')->on('subjects')->onDelete('cascade');

    $table->timestamps();
});
    }

    public function down()
    {
        Schema::dropIfExists('grades');
    }
}

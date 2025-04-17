<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\SubjectController;
use App\Http\Controllers\GradesController;

// Sākumlapa
Route::get('/', function () {
    return view('welcome');
})->name('home');


// =========================
// STUDENTS ROUTES
// =========================
Route::get('/students', [StudentController::class, 'index'])->name('students.index');
Route::get('/students/create', [StudentController::class, 'create'])->name('students.create');
Route::post('/students', [StudentController::class, 'store'])->name('students.store');
Route::get('/students/{student}/edit', [StudentController::class, 'edit'])->name('students.edit');
Route::put('/students/{student}', [StudentController::class, 'update'])->name('students.update');
Route::delete('/students/{student}', [StudentController::class, 'destroy'])->name('students.destroy');
Route::get('/students/{student}', [StudentController::class, 'show'])->name('students.show'); // <- Ja vajag "view" vienam studentam

// =========================
// SUBJECTS ROUTES
// =========================
Route::get('/subjects', [SubjectController::class, 'index'])->name('subjects.index');
Route::get('/subjects/create', [SubjectController::class, 'create'])->name('subjects.create');
Route::post('/subjects', [SubjectController::class, 'store'])->name('subjects.store');
Route::get('/subjects/{subject}/edit', [SubjectController::class, 'edit'])->name('subjects.edit');
Route::put('/subjects/{subject}', [SubjectController::class, 'update'])->name('subjects.update');
Route::delete('/subjects/{subject}', [SubjectController::class, 'destroy'])->name('subjects.destroy');
Route::get('/subjects/{subject}', [SubjectController::class, 'show'])->name('subjects.show'); // <- Ja vajag "view" vienam priekšmetam

// =========================
// GRADES ROUTES
// =========================
Route::get('/grades', [GradesController::class, 'index'])->name('grades.index');
Route::get('/grades/create', [GradesController::class, 'create'])->name('grades.create');
Route::post('/grades', [GradesController::class, 'store'])->name('grades.store');
Route::get('/grades/{grade}/edit', [GradesController::class, 'edit'])->name('grades.edit');
Route::put('/grades/{grade}', [GradesController::class, 'update'])->name('grades.update');
Route::delete('/grades/{grade}', [GradesController::class, 'destroy'])->name('grades.destroy');
Route::get('/grades/{grade}', [GradesController::class, 'show'])->name('grades.show'); // <- Ja vajag "view" vienai atzīmei

<?php

namespace App\Http\Controllers;

use App\Models\Student;
use App\Models\Subject;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function index()
    {
        $students = Student::all();
        return view('students.index', compact('students'));
    }

    public function create()
    {
        // Saņemt visus priekšmetus, lai pievienotu tos studentiem
        $subjects = Subject::all();
        return view('students.create', compact('subjects'));
    }

    public function store(Request $request)
    {
        // Validējam pievienotā studenta datus
        $validated = $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'subjects' => 'required|array',  // Priekšmeti jāizvēlas
        ]);

        // Izveidot jaunu studentu
        $student = Student::create([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
        ]);

        // Piesaistīt priekšmetus studentam (pivot tabula)
        $student->subjects()->attach($request->subjects);

        return redirect()->route('students.index');
    }

    public function edit(Student $student)
    {
        // Saņemt visus priekšmetus, lai rediģētu studenta priekšmetus
        $subjects = Subject::all();
        return view('students.edit', compact('student', 'subjects'));
    }

    public function update(Request $request, Student $student)
    {
        // Validējam pievienotā studenta datus
        $validated = $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'subjects' => 'required|array',  // Priekšmeti jāizvēlas
        ]);

        // Atjaunojam studenta datus
        $student->update([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
        ]);

        // Piesaistīt priekšmetus studentam (pivot tabula)
        $student->subjects()->sync($request->subjects);

        return redirect()->route('students.index');
    }

    public function destroy(Student $student)
    {
        $student->delete();
        return redirect()->route('students.index');
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Grade;
use App\Models\Subject;
use App\Models\Student;

class GradesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $grades = Grade::all();
        return view('grades.index', compact('grades'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $students = Student::all();  // Pārliecinies, ka šie dati eksistē
        $subjects = Subject::all();  // Un šie dati arī
        return view('grades.create', compact('students', 'subjects'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Pielāgota validācija, ņemot vērā student_id, subject_id un grade
        $request->validate([
            'student_id' => 'required|exists:students,id',  // Skolēns ir jāeksistē
            'subject_id' => 'required|exists:subjects,id',  // Priekšmets ir jāeksistē
            'grade' => 'required|numeric|min:1|max:10',     // Atzīmei jābūt starp 1 un 10
        ]);

        // Saglabājam jaunu atzīmi
        Grade::create([
            'student_id' => $request->student_id,
            'subject_id' => $request->subject_id,
            'grade' => $request->grade,
        ]);

        return redirect()->route('grades.index')->with('success', 'Grade created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Grade $grade)
    {
        return view('grades.show', compact('grade'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Grade $grade)
    {
        // Iegūst skolēnus un priekšmetus, lai tos pārsūtītu uz skatījumu
        $students = Student::all();
        $subjects = Subject::all();
        
        // Pārsūti šo informāciju uz skatījumu
        return view('grades.edit', compact('grade', 'students', 'subjects'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Grade $grade)
    {
        // Pielāgota validācija
        $request->validate([
            'student_id' => 'required|exists:students,id',
            'subject_id' => 'required|exists:subjects,id',
            'grade' => 'required|numeric|min:1|max:10',
        ]);

        // Atjauninām atzīmi
        $grade->update([
            'student_id' => $request->student_id,
            'subject_id' => $request->subject_id,
            'grade' => $request->grade,
        ]);

        return redirect()->route('grades.index')->with('success', 'Grade updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Grade $grade)
    {
        $grade->delete();

        return redirect()->route('grades.index')->with('success', 'Grade deleted successfully.');
    }
}

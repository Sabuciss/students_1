<?php

namespace App\Http\Controllers;

use App\Models\Subject;
use App\Models\Grade;
use App\Models\Student;
use Illuminate\Http\Request;

class SubjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $subjects = Subject::query();
    
        if ($request->has('search')) {
            $subjects->where('subject_name', 'like', '%' . $request->search . '%');
        }
    
        $subjects = $subjects->get();
        return view('subjects.index', compact('subjects'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('subjects.create'); // Rāda formu jaunam priekšmetam
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validācija
        $validated = $request->validate([
            'subject_name' => 'required|string|max:100|unique:subjects', // Jābūt unikālam
        ]);

        // Saglabāt priekšmetu
        Subject::create($validated);

        // Pāradresēt uz priekšmetu sarakstu
        return redirect()->route('subjects.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        // Atrod konkrētu priekšmetu
        $subject = Subject::findOrFail($id);
        return view('subjects.show', compact('subject')); // Rāda konkrētu priekšmetu
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        // Atrod priekšmetu rediģēšanai
        $subject = Subject::findOrFail($id);
        return view('subjects.edit', compact('subject')); // Rāda formu priekšmeta rediģēšanai
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // Validācija
        $validated = $request->validate([
            'subject_name' => 'required|string|max:100|unique:subjects,subject_name,' . $id, // Atļauts tikai šim priekšmetam
        ]);

        // Atjaunināt priekšmetu
        $subject = Subject::findOrFail($id);
        $subject->update($validated);

        // Pāradresēt uz priekšmetu sarakstu
        return redirect()->route('subjects.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        // Atrast priekšmetu un dzēst
        $subject = Subject::findOrFail($id);
        $subject->delete();

        // Pāradresēt uz priekšmetu sarakstu
        return redirect()->route('subjects.index');
    }
}

<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules\Password;
use Illuminate\Validation\ValidationException;


class SessionController extends Controller
{
    public function destroy()
    {
        Auth::logout();
        return redirect("/");
    }

    public function create()
    {
        return view("auth.login");
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            "email" => ['required', 'email'],
            "password" => ["required"]
        ]);
        Auth::attempt($validated);
            if (!Auth::attempt($validated)) {
                throw ValidationException::withMessages([
                    "email" => "Nepareiz e-pasts vai parole"
                ]);
            }
        $request->session()->regenerate();
        $user = Auth::user();

        if ($user->role === 'teacher') {
            return redirect()->route('grades.index'); // vai 'students.index' ja vēlies
        } elseif ($user->role === 'student') {
            return redirect()->route('grades.index'); // vai cita lapa skolēniem
        }
        
        return redirect('/');
    }

   
}

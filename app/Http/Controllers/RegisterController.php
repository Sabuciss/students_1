<?php

namespace App\Http\Controllers;

use App\Models\Users;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;


class RegisterController extends Controller
{
    // Reģistrācijas datu saglabāšana
    public function store(Request $request)
    {
        // Validācija
        $validated = $request->validate([
            'first_name' => 'required|string|max:50|regex:/^[\pL\s]+$/u', // tikai burti un atstarpes
            'last_name' => 'required|string|max:50|regex:/^[\pL\s]+$/u', // tikai burti un atstarpes
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
            'role' => 'required|in:student,teacher',
        ]);

        // Lietotāja izveidošana
        $user = Users::create([
            'first_name' => $validated['first_name'],
            'last_name' => $validated['last_name'],
            'email' => $validated['email'],
            'password' => Hash::make($validated['password']),
            'role' => $validated['role'],
        ]);

        // Pieslēdz lietotāju pēc reģistrācijas
        Auth::login($user);

        if ($user->role === 'student') {
            return redirect()->route('students.index');  // Pāradresē uz studentu sarakstu
        } elseif ($user->role === 'teacher') {
            return redirect()->route('teachers.dashboard');  // Pāradresē uz skolotāja paneli
        }
    
        return redirect('/');
    }
}
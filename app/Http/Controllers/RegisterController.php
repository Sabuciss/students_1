<?php
namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class RegisterController extends Controller
{
    public function create()
    {
        return view('auth.register'); 
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'first_name' => 'required|string|max:50',
            'last_name' => 'required|string|max:50',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:8',
            'role' => 'required|in:student,teacher',
        ]);
    
        $user = User::create([
            'name' => $validated['first_name'] . ' ' . $validated['last_name'], 
            'email' => $validated['email'],
            'password' => Hash::make($validated['password']),
            'role' => $validated['role'], 
        ]);
    
        Auth::login($user);
    
        if ($user->role === 'student') {
            return redirect()->route('students.index'); 
        } elseif ($user->role === 'teacher') {
            return redirect()->route('teachers.dashboard');
        }
    
        return redirect('/');
    }
    
}

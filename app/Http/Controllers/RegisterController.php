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

    // Lietotāja izveide
    $user = User::create([
        'first_name' => $validated['first_name'],
        'last_name' => $validated['last_name'],
        'email' => $validated['email'],
        'password' => Hash::make($validated['password']),
        'role' => $validated['role'],
    ]);

    // Lietotāja pieslēgšana
    Auth::login($user);

    // Pāradresēšana atkarībā no lomas
    if ($user->role === 'student') {
        return redirect()->route('students.index');  // Ja loma ir 'student'
    } elseif ($user->role === 'teacher') {
        return redirect()->route('students.index');  // Ja loma ir 'teacher'
    }

    return redirect('/');  // Ja kaut kas nav kārtībā
}

    

    
}

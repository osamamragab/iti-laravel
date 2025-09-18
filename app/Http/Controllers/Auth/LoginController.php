<?php
namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
     //login

     public function showLoginForm()
    {
        return view('student.login'); 
    }

   
    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|string',
        ]);

        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            return redirect()->route('user.books.index'); 
        }


        return back()->withErrors([
            'email' => 'email or password is invalid',
        ])->withInput();
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('login.form');
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function login(Request $request) {
        $loginData = $request->validate([
            'username' => ['required'],
            'password' => ['required']
        ]);

        if ($loginData['username'] == 'admin') {
             if ($loginData['password'] == 'admin') {
                 return redirect('/dashboard/vehicles')->with('success', 'Login successful! Have a nice day!');
             }
        } else {
            return redirect('/')->with('failure', 'Incorrect username or password!');
        }
    }
}

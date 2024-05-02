<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class UserController extends Controller
{
    public function create() {
        return view('users.register');
    }

    public function login() {
        return view('users.login');
    }

    public function authenticate(Request $request) {
        
        $formFields = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required']
        ]);

        if(auth()->attempt($formFields)) {
            $request->session()->regenerate();
            return redirect('/')->with('message', 'You are logged in');
        }

        return back()->withErrors(['email' => 'E-mail and/or password incorrect'])->onlyInput('email');

    }
   
    public function store(Request $request) {
        $formFields = $request->validate([
            'name' => ['required', 'min:3'],
            'email' => ['required', 'email', Rule::unique('users', 'email')],
            'password' => ['required', 'confirmed', 'min:6']
        ]);
        $formFields['password'] = bcrypt($formFields['password']);
        $user = User::create($formFields);
        auth()->login($user);
        return redirect('/')->with('message', 'User created and logged in');
    }

    public function edit($id) {
        if($id == auth()->user()->id) {
            $user = User::where('id', $id)->first();        
            return view('users.edit')->with('user', $user);
        }
        else {
            return redirect("/");
        }
    }

    public function update(Request $request) {
        if($request->input("id") == auth()->user()->id) {
            $user = User::where('id', $request->input('id'))->first();        
            $formFields = $request->validate([
                'name' => ['required', 'min:3'],
                'email' => ['required', 'email', Rule::unique('users', 'email')->ignore($user->id)]
            ]);
            $user->update($formFields);
            return redirect('/')->with('message', 'User updated successfully');
        }
        else {
            return redirect("/");
        }
    }

    public function logout(Request $request) {
        auth()->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/')->with('message', 'You have been logged out');
    }
}

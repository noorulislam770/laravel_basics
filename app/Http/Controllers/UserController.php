<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Models\User;
class UserController extends Controller
{
    //


    // show user creation form
    public function create()
    {
        return view('users.register');
    }


    public function store(Request $request)
    {
        $formFields = $request->validate([
            'name' => ['required', 'min:3'],
            'email' => ['required',Rule::unique('users','email')],
            'password' => 'required|confirmed|min:6'
        ]);


        $formFields['password'] = bcrypt($formFields['password']);

        // Create User
        $user = User::create($formFields);


        // Login
        auth()->login($user);
        return redirect('/')->with('message','User Created and Logged In!');


    }

    public function logout(Request $request){
        auth()->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/')->with('message','you have been logged out!');
    }


    // Show login page
    public function login(Request $request ){
        return view('users.login');
    }

    public function authenticate(Request $request){
        $formFields = $request->validate([
            'email' => ['required','email'],
            'password' => 'required'
        ]);

        if (auth()->attempt($formFields)){
            $request->session()->regenerate();

            return redirect('/')->with('message','successfully logged In!');
        }

        return back()->withErrors(['email'=>'Invalid Credentials'])->onlyInput('email');

    }



}

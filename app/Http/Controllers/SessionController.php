<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SessionController extends Controller
{
    //Logout
    public function destroy(){
        auth()->logout();
        return redirect('/')->with('message','You are logged out!');
    }

    //Login page
    public function create(){
        return view('sessions.login');
    }

    //Store
    public function store(){
        $credentials = request()->validate([
            'password'=>'required|min:7|max:255',
            'email'=>'required|email|min:10|max:255'
        ]);

        if(auth()->attempt($credentials)){
            session()->regenerate();
            return redirect('/')->with('message','You are logged in!');
        }

        //If auth fails
        return back()->withInput()->withErrors(['email'=>'Your provided credentials could not be verified!']);

    }
}

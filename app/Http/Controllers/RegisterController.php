<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    //
    public function create(){
        return view('register.create',[]);
    }

    public function store(){
        $credentials = request()->validate([
            'name'=>'required|min:3|max:255',
            'username'=>'required|min:5|max:255',
            'password'=>'required|min:7|max:255',
            'email'=>'required|email|min:10|max:255|unique:users'
        ]);

        $credentials['password'] = bcrypt(request('password'));
        $user = User::create($credentials);
        auth()->login($user);
        return redirect('/')->with('message','Your account has been created!');;
    }

}

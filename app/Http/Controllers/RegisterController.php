<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function index()
    {
        return view('auth.register', [

          ]);
    }


    public function store(Request $request){

        $validatedData = $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required'
        ]);


        $validatedData['password'] = Hash::make($validatedData['password']);

        User::create($validatedData);
        return redirect('auth/register')->with('success', 'Register Success!');
    }
}

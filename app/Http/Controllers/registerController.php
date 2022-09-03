<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use App\Models\User;
use Image;

class registerController extends Controller
{
    public function home(){

        return view('home');
    }

    public function sign_up(){

        return view('register');
    }

     public function register(Request $request)
    {
        //return $request;
        $validatedData = $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required|email|unique:users,email',
            'phone' => 'required|numeric|unique:users,phone|digits:10',
            'password' => 'required|confirmed|string',
            'terms_and_conditions' =>'accepted'
        ]);


        $user = User::create([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'email' => $request->email,
            'phone' => $request->phone,
            'role_id' => 3,
            'is_finanace' => 0,
            'is_tax' => 0,
            'is_active' => 0,
            'is_lock' => 0,
            'is_delete' => 0,
            'is_profile_verified' => 0,
            'is_profile_updated' => 0,
            'password' => \Hash::make($request->password),
        ]);

        return redirect('sign_in');
    }

    
}

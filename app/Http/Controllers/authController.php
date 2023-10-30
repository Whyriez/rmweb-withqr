<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class authController extends Controller
{
    public function index()
    {

        return view('pages.admin.login');
    }

    public function proses_login(Request $request)
    {
        Session::flash('email', $request->email);
        $request->validate(
            [
                'email' => 'required',
                'password' => 'required'
            ],
            [
                'email.require' => 'email tidak bisa kosong',
                'password.require' => 'password tidak bisa kosong',
            ]
        );

        $infologin = [
            'email' => $request->email,
            'password' => $request->password
        ];

        if(Auth::attempt($infologin)){
            return redirect('admin');
        }else{
            return redirect('login')->withErrors('Email dan Password yang anda masukkan tidak valid');
        }
    }

    public function logout(Request $request){
        Auth::logout();
        return redirect('login');
    }
}

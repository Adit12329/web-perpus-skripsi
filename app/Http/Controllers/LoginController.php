<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User as ModelsUser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use User;

class LoginController extends Controller
{
    public function postlogin (Request $request){

        // dd($request->user()->level);
        if (Auth::attempt($request->only('email', 'password'))){
            return redirect('/beranda');
        }
        return redirect ('/');
    }

    public function logout() {
        Auth::logout();
        return redirect('/');
    }

    public function register()
    {
        return view('pengguna.registrasilogin');
    }

    public function simpanregister(Request $request)
    {
    //    dd($request->all());
    User::create([
        'name' => $request->name,
        'level' => 'user',
        'email' => $request->email,
        'password' => bcrypt($request->password)
    ]);
    return redirect('/beranda')->with(Auth::attempt(['email' => $request->email, 'password' => $request->password]));
    }
};

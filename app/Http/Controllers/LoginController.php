<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController
{
    public function index(){
        return view('login.index');
    }

    public function logar(Request $request){
        if(!Auth::attempt($request->except('_token'))){
            return redirect()->back()->withErrors('E-mail ou senha inválidos');
        }

        return to_route('projetos.index');

    }

    public function logout(){
        Auth::logout();

        return to_route('login');
    }
}

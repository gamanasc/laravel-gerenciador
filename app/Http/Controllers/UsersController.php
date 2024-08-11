<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UsersController extends Controller
{
    public function create(){
        return view('users.create');
    }

    public function store(Request $request){

        $dados = $request->except(['_token']);
        $dados['password'] = Hash::make($dados['password']);
        $usuario = User::create($dados);
        Auth::login($usuario);

        return to_route('projetos.index');

    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Http\Request;

class ProjetosController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $projetos = Project::query()
            ->orderBy('created_at', 'desc')->get();

        $mensagemSucesso = session('mensagem.sucesso');

        return view('projetos.index')
            ->with('projetos', $projetos)
            ->with('mensagemSucesso', $mensagemSucesso);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('projetos.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Mass assignment do Eloquent, para salvar os dados no banco, baseado no atributo fillable, definido na Model
        Project::create($request->all());
        session()->flash('mensagem.sucesso', 'Projeto adicionado com sucesso');

        return to_route('projetos.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        Project::destroy($request->id);
        // Mensagem de retorno sendo salva na sessão, no modelo flash, para ser apagada após a leitura
        session()->flash('mensagem.sucesso', 'Projeto removido com sucesso');

        return to_route('projetos.index');
    }
}

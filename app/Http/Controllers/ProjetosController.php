<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProjetoFormRequest;
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
        $mensagemErro = session('mensagem.erro');

        return view('projetos.index')
            ->with('projetos', $projetos)
            ->with('mensagemSucesso', $mensagemSucesso)
            ->with('mensagemErro', $mensagemErro);
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
    public function store(ProjetoFormRequest $request)
    {
        // Mass assignment do Eloquent, para salvar os dados no banco, baseado no atributo fillable, definido na Model
        $projeto = Project::create($request->all());
        session()->flash('mensagem.sucesso', "Projeto \"{$projeto->titulo}\" adicionado com sucesso");

        return to_route('projetos.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Request $request)
    {
        $projeto = Project::find($request->id);

        return view('projetos.show')
            ->with('projeto', $projeto);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Request $request)
    {
        // Busca do projeto do id enviado
        $projeto = Project::find($request->id);

        dd($projeto->tasks());

        return view('projetos.edit')
            ->with('projeto', $projeto);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ProjetoFormRequest $request, string $id)
    {
        // Busca do projeto do id enviado
        $projeto = Project::find($request->id);

        if(is_null($projeto)){
            // Mensagem de erro sendo salva na sessão, no modelo flash, para ser apagada após a leitura
            return to_route('projetos.index')
                ->with('mensagem.erro', "Houve um erro na remoção do projeto");
        }

        // Mass assignment do Eloquent, para atualizar os dados no banco, baseado no atributo fillable, definido na Model
        $projeto->fill($request->all());
        $projeto->save();

        return to_route('projetos.index')
            ->with('mensagem.sucesso', "Projeto \"{$projeto->titulo}\" atualizado com sucesso");



    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        // Busca do projeto do id enviado
        $projeto = Project::find($request->id);

        if(is_null($projeto)){
            // Mensagem de erro sendo salva na sessão, no modelo flash, para ser apagada após a leitura
            return to_route('projetos.index')
                ->with('mensagem.erro', "Houve um erro na remoção do projeto");
        }

        // Remoção do projeto
        Project::destroy($request->id);

        // Mensagem de sucesso sendo salva na sessão, no modelo flash, para ser apagada após a leitura
        return to_route('projetos.index')
            ->with('mensagem.sucesso', "Projeto \"{$projeto->titulo}\" removido com sucesso");
    }
}

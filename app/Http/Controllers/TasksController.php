<?php

namespace App\Http\Controllers;

use App\Http\Requests\TarefaFormRequest;
use Illuminate\Http\Request;
use App\Models\Project;
use App\Models\Task;


class TasksController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        // Busca do projeto do id enviado
        $projeto = Project::find($request->id);

        return view('tarefas.create')
            ->with('projeto', $projeto);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(TarefaFormRequest $request)
    {
        // Mass assignment do Eloquent, para salvar os dados no banco, baseado no atributo fillable, definido na Model
        $tarefa = Task::create($request->all());
        session()->flash('mensagem.sucesso', "Projeto \"{$tarefa->titulo}\" adicionado com sucesso");

        return to_route('projetos.show', $tarefa->project_id);
    }

    /**
     * Display the specified resource.
     */
    public function show(Request $request)
    {
        $tarefa = Task::find($request->id);

        $mensagemSucesso = session('mensagem.sucesso');
        $mensagemErro = session('mensagem.erro');

        return view('tarefas.show')
            ->with('tarefa', $tarefa)
            ->with('mensagemSucesso', $mensagemSucesso)
            ->with('mensagemErro', $mensagemErro);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Request $request)
    {
        // Busca da tarefa do id enviado
        $tarefa = Task::find($request->id);

        return view('tarefas.edit')
            ->with('tarefa', $tarefa);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(TarefaFormRequest $request, string $id)
    {
        // Busca da tarefa do id enviado
        $tarefa = Task::find($request->id);

        if(is_null($tarefa)){
            // Mensagem de erro sendo salva na sessão, no modelo flash, para ser apagada após a leitura
            return to_route('projetos.show', $request->project_id)
                ->with('mensagem.erro', "Houve um erro na atualização da tarefa");
        }

        // Mass assignment do Eloquent, para atualizar os dados no banco, baseado no atributo fillable, definido na Model
        $tarefa->fill($request->all());
        $tarefa->save();

        return to_route('projetos.show', $tarefa->project_id)
            ->with('mensagem.sucesso', "Tarefa \"{$tarefa->titulo}\" atualizada com sucesso");



    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        // Busca do projeto do id enviado
        $tarefa = Task::find($request->id);

        if(is_null($tarefa)){
            // Mensagem de erro sendo salva na sessão, no modelo flash, para ser apagada após a leitura
            return to_route('projetos.show', $request->project_id)
                ->with('mensagem.erro', "Houve um erro na remoção da tarefa");
        }

        // Remoção do projeto
        Task::destroy($request->id);

        // Mensagem de sucesso sendo salva na sessão, no modelo flash, para ser apagada após a leitura
        return to_route('projetos.show', $tarefa->project_id)
            ->with('mensagem.sucesso', "Tarefa \"{$tarefa->titulo}\" removida com sucesso");
    }
}

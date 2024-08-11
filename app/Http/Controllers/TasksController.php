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
    public function destroy(string $id)
    {
        //
    }
}

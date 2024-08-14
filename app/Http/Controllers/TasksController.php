<?php

namespace App\Http\Controllers;

use App\Http\Requests\TarefaFormRequest;
use App\Mail\TaskUpdated;
use Illuminate\Http\Request;
use App\Models\Project;
use App\Models\Task;
use App\Models\User;
use App\Notifications\TaskUpdatedNotification;
use Illuminate\Support\Facades\Mail;

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
     * export
     */
    public function export()
    {
        dd('teste');
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
        session()->flash('mensagem.sucesso', "Tarefa \"{$tarefa->titulo}\" adicionado com sucesso");

        return to_route('projetos.show', $tarefa->project_id);
    }

    /**
     * Método para mostrar a tela para vincular usuário à tarefa
     */
    public function create_user(Request $request)
    {
        $tarefa = Task::find($request->id);
        $usuarios = User::doesntHave('tasks')->get();

        $mensagemSucesso = session('mensagem.sucesso');
        $mensagemErro = session('mensagem.erro');

        return view('tarefas.create_user')
            ->with('tarefa', $tarefa)
            ->with('usuarios', $usuarios)
            ->with('mensagemSucesso', $mensagemSucesso)
            ->with('mensagemErro', $mensagemErro);
    }

    /**
     * Método para mostrar a tela para vincular usuário à tarefa
     */
    public function store_user(Request $request)
    {

        $request->validate([
            'user_id' => 'required|integer',
            'task_id' => 'required|integer',
        ]);

        // Mass assignment do Eloquent, para salvar os dados no banco, baseado no atributo fillable, definido na Model
        $usuario = User::find($request->user_id);
        $usuario->tasks()->attach($request->task_id);
        session()->flash('mensagem.sucesso', "Usuário vinculado com sucesso");

        return to_route('tarefas.show', $request->task_id);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy_user(Request $request)
    {
        $request->validate([
            'user_id' => 'required|integer',
            'task_id' => 'required|integer',
        ]);

        $usuario = User::find($request->user_id);
        // Remoção da relação
        $usuario->tasks()->detach($request->task_id);

        // Mensagem de sucesso sendo salva na sessão, no modelo flash, para ser apagada após a leitura
        return to_route('tarefas.show', $request->task_id)
            ->with('mensagem.sucesso', "Usuário desvinculado com sucesso");
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

        foreach ($tarefa->users as $user) {
            $user->notify(new TaskUpdatedNotification($user, $tarefa));
        }


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

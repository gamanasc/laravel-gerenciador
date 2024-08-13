<?php

namespace Tests\Feature;

use App\Models\Project;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class TaskTest extends TestCase
{
    use RefreshDatabase;

    public function test_create_project(): void
    {

        // Cria um usuário fictício para autenticação
        $user = User::factory()->create();

        // Simula a autenticação do usuário
        $this->actingAs($user);

        // Dados de um projeto
        $projeto = [
            'titulo' => 'Projeto Teste',
            'descricao' => 'Descrição do projeto teste',
        ];

        // Faz a requisição POST para a rota de criação de projeto
        $this->post( route('projetos.store') , $projeto);

        // Consulta o último projeto criado
        $project = Project::where('titulo', $projeto['titulo'])->first();

        // Dados de uma tarefa
        $tarefa = [
            'project_id' => $project->id,
            'titulo' => 'Tarefa Teste',
            'descricao' => 'Descrição da tarefa teste',
            'status' => 'ACTIVE',
            'dt_vencimento' => Carbon::now()->toDateString(),
        ];

        // Faz a requisição POST para a rota de criação de tarefa
        $response = $this->post( route('tarefas.store') , $tarefa);

        // Verifica se a resposta foi bem-sucedida
        $response->assertStatus(302);

        // Verifica se o projeto foi salvo no banco de dados
        $this->assertDatabaseHas('tasks', $tarefa);
    }
}

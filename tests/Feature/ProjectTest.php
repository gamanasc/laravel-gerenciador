<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ProjectTest extends TestCase
{

    use RefreshDatabase;

    /**
     * A basic feature test example.
     */
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
        $response = $this->post( route('projetos.store') , $projeto);

        // Debugar erros
        // $response->dump();

        // Verifica se a resposta foi bem-sucedida
        $response->assertStatus(302);

        // Verifica se o projeto foi salvo no banco de dados
        $this->assertDatabaseHas('projects', [
            'titulo' => 'Projeto Teste',
            'descricao' => 'Descrição do projeto teste',
        ]);
    }
}

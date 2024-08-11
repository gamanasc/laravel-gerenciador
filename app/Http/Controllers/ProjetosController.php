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
        $projetos = Project::all();

        return view('projetos.index')
            ->with('projetos', $projetos);
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
        $titulo = $request->input('titulo');
        $descricao = $request->input('descricao');

        $projeto = new Project();
        $projeto->titulo = $titulo;
        $projeto->descricao = $descricao;
        $projeto->save();

        return redirect('/projetos');
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

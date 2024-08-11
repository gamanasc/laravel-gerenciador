<x-layout title="Novo projeto">


    <form action="{{ route('projetos.store') }}" method="post">
        @csrf <!-- Proteção contra cross site request forgery -->
        <label for="titulo" class="form-label">Título:</label>
        <input type="text" class="form-control" name="titulo" id="titulo">

        <label for="titulo" class="form-label">Descrição:</label>
        <input type="text" class="form-control" name="descricao" id="descricao">

        <input type="submit" class="my-3 btn btn-primary" value="Enviar">
    </form>

    <a href="{{ route('projetos.index') }}" class="btn btn-link px-0">Cancelar</a>

</x-layout>

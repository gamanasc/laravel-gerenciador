{{-- Tag personalizada para referenciar o layout padrão, com o título "Projetos" --}}
<x-layout title="{{$projeto->titulo}}">

    <hr>
    <p class="mb-5">{{$projeto->descricao}}</p>

    <h3 class="mb-4 d-flex justify-content-between align-items-center">
        <span>Tarefas do projeto</span>
        <a href="{{ route('tarefas.create', $projeto->id) }}" class="btn btn-primary">Adicionar</a>
    </h3>

    <ul class="list-group mb-3">
        @foreach ($projeto->tasks as $task)
            <li class="list-group-item"> {{$task->titulo}} </li>
        @endforeach
    </ul>


    <a href="{{ route('projetos.index') }}" class="btn btn-link px-0">Voltar</a>

</x-layout>

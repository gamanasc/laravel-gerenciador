{{-- Tag personalizada para referenciar o layout padrão, com o título "Projetos" --}}
<x-layout title="{{$projeto->titulo}}">

    <hr>
    <p>{{$projeto->descricao}}</p>

    <h3 class="mb-3">Tarefas do projeto</h3>
    <ul class="list-group mb-3">
        @foreach ($projeto->tasks as $task)
            <li class="list-group-item"> {{$task->titulo}} </li>
        @endforeach
    </ul>


    <a href="{{ route('projetos.index') }}" class="btn btn-link px-0">Voltar</a>

</x-layout>

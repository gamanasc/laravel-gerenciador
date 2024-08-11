{{-- Tag personalizada para referenciar o layout padrão, com o título "Projetos" --}}
<x-layout title="{{$projeto->titulo}}">

    <hr>
    <p class="mb-5">{{$projeto->descricao}}</p>

    <h3 class="mb-4 d-flex justify-content-between align-items-center">
        <span>Tarefas do projeto</span>
        <a href="{{ route('tarefas.create', $projeto->id) }}" class="btn btn-primary">Adicionar</a>
    </h3>

    @isset($mensagemSucesso)
    <div class="alert alert-success">
        {{ $mensagemSucesso }}
    </div>
    @endisset

    @isset($mensagemErro)
    <div class="alert alert-danger">
        {{ $mensagemErro }}
    </div>
    @endisset

    <ul class="list-group mb-3">
        @foreach ($projeto->tasks as $task)
            <li class="list-group-item  d-flex justify-content-between align-items-center">
                <span>
                    {{$task->titulo}} <br>
                    <small>{{$task->descricao}}</small>
                </span>

                <span class="d-flex">

                    <a href="{{ route('tarefas.show', $task->id) }}" class="btn btn-dark btn-sm">
                        Ver
                    </a>

                    <a href="{{ route('tarefas.edit', $task->id) }}" class="btn btn-primary btn-sm mx-1">
                        Editar
                    </a>

                    <form action="{{ route('tarefas.destroy', $task->id) }}" method="post">
                        @csrf
                        <button type="submit" class="btn btn-danger btn-sm">
                            Remover
                        </button>
                    </form>
                </span>

            </li>
        @endforeach
    </ul>


    <a href="{{ route('projetos.index') }}" class="btn btn-link px-0">Voltar</a>

</x-layout>

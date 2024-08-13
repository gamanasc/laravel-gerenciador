{{-- Tag personalizada para referenciar o layout padrão, com o título "Projetos" --}}
<x-layout title="{{$tarefa->titulo}}">

    <hr>
    <p class="mb-5">{{$tarefa->descricao}}</p>

    <h3 class="mb-4 d-flex justify-content-between align-items-center">
        <span>Usuários vinculados à tarefa</span>
        <a href="{{ route('tarefas.create_user', $tarefa->id) }}" class="btn btn-primary">Adicionar</a>
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
        @isset($tarefa->users)
            @foreach ($tarefa->users as $user)


                <li class="list-group-item d-flex justify-content-between align-items-center">
                    <span>
                        {{$user->name}} <br>
                        <small>{{$user->email}}</small>
                    </span>

                    <span class="d-flex">

                        <form action="" method="post">
                            @csrf
                            <button type="submit" class="btn btn-danger btn-sm">
                                Remover
                            </button>
                        </form>
                    </span>
                </li>
            @endforeach
        @endisset
    </ul>


    <a href="{{ route('projetos.show', $tarefa->project_id) }}" class="btn btn-link px-0">Voltar</a>

</x-layout>

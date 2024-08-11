{{-- Tag personalizada para referenciar o layout padrão, com o título "Projetos" --}}
<x-layout title="Projetos">

    <a href="{{ route('projetos.create') }}" class="btn btn-primary my-4">Adicionar</a>

    @isset($mensagemSucesso)
    <div class="alert alert-success">
        {{ $mensagemSucesso }}
    </div>
    @endisset

    <ul class="list-group">
        @foreach ($projetos as $projeto)
            <li class="list-group-item d-flex justify-content-between align-items-center">
                <span>
                    {{$projeto->titulo}} <br>
                    <small>{{$projeto->descricao}}</small>
                </span>

                <form action="{{ route('projetos.destroy', $projeto->id) }}" method="post">
                    @csrf
                    <button type="submit" class="btn btn-danger btn-sm">
                        Remover
                    </button>
                </form>
            </li>
        @endforeach
    </ul>

</x-layout>

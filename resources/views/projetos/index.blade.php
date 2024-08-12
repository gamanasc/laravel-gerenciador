<x-app-layout>
    <x-slot name="header">

        <div class="d-flex justify-content-between align-items-start w-100">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Projetos') }}
            </h2>

            <a href="{{ route('projetos.create') }}" class="btn btn-primary">Adicionar</a>
        </div>

    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">


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

                <ul class="list-group">
                    @foreach ($projetos as $projeto)
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            <span>
                                {{$projeto->titulo}} <br>
                                <small>{{$projeto->descricao}}</small>
                            </span>

                            <span class="d-flex">

                                <a href="{{ route('projetos.show', $projeto->id) }}" class="btn btn-dark btn-sm">
                                    Ver
                                </a>

                                <a href="{{ route('projetos.edit', $projeto->id) }}" class="btn btn-primary btn-sm mx-1">
                                    Editar
                                </a>

                                <form action="{{ route('projetos.destroy', $projeto->id) }}" method="post">
                                    @csrf
                                    <button type="submit" class="btn btn-danger btn-sm">
                                        Remover
                                    </button>
                                </form>
                            </span>
                        </li>
                    @endforeach
                </ul>

            </div>
        </div>
    </div>
</x-app-layout>



{{-- Tag personalizada para referenciar o layout padrão, com o título "Projetos" --}}
{{-- <x-layout title="Projetos">



</x-layout> --}}

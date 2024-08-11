{{-- Tag personalizada para referenciar o layout padrão, com o título "Projetos" --}}
<x-layout title="Ver Projeto '{{$projeto->titulo}}'">

    <hr>
    <h2>{{$projeto->titulo}}</h2>
    <p>{{$projeto->descricao}}</p>

    <a href="{{ route('projetos.index') }}" class="btn btn-link px-0">Voltar</a>

</x-layout>

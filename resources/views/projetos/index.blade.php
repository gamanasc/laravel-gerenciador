{{-- Tag personalizada para referenciar o layout padrão, com o título "Projetos" --}}
<x-layout title="Projetos">

    <a href="/projetos/criar" class="btn btn-primary my-4">Adicionar</a>

    <ul class="list-group">
        @foreach ($projetos as $projeto)
            <li class="list-group-item">
                {{$projeto->titulo}} <br>
                <small>{{$projeto->descricao}}</small>
            </li>
        @endforeach
    </ul>

</x-layout>

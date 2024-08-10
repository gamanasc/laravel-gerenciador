{{-- Tag personalizada para referenciar o layout padrão, com o título "Projetos" --}}
<x-layout title="Projetos">

    <a href="/projetos/criar">Adicionar</a>

    <ul>
        @foreach ($projetos as $projeto)
            <li>{{$projeto}}</li>
        @endforeach
    </ul>

</x-layout>

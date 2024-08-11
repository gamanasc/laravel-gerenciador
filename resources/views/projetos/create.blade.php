<x-layout title="Novo projeto">
    <x-projetos.form action="{{ route('projetos.store') }}" :titulo="old('titulo')" :descricao="old('descricao')"/>

    <a href="{{ route('projetos.index') }}" class="btn btn-link px-0">Cancelar</a>

</x-layout>

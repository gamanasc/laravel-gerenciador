<x-layout title="Novo projeto">
    <x-projetos.form action="{{ route('projetos.store') }}" />

    <a href="{{ route('projetos.index') }}" class="btn btn-link px-0">Cancelar</a>

</x-layout>

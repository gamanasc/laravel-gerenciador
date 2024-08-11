<x-layout title="Editar projeto '{{ $projeto->titulo }}'">
    <x-projetos.form
        action="{{ route('projetos.update', $projeto->id) }}"
        titulo="{{ $projeto->titulo }}"
        descricao="{{ $projeto->descricao }}"
    />

    <a href="{{ route('projetos.index') }}" class="btn btn-link px-0">Cancelar</a>
</x-layout>

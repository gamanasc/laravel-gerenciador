<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Editar projeto: "{{ $projeto->titulo }}"
        </h2>
    </x-slot>


    <div class="py-12">

        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <x-projetos.form action="{{ route('projetos.update', $projeto->id) }}"
                titulo="{{ $projeto->titulo }}"
                descricao="{{ $projeto->descricao }}"
                textoBotao="Atualizar"
                />

            <a href="{{ route('projetos.index') }}">
                <x-secondary-button class="mx-1 my-4">
                    {{ __('Cancelar') }}
                </x-secondary-button>
            </a>

        </div>

    </div>


</x-app-layout>

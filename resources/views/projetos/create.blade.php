<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Novo projeto
        </h2>
    </x-slot>


    <div class="py-12">

        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <x-projetos.form action="{{ route('projetos.store') }}" :titulo="old('titulo')" :descricao="old('descricao')" textoBotao="Adicionar"/>

            <a href="{{ route('projetos.index') }}">
                <x-secondary-button class="mx-1 my-4">
                    {{ __('Cancelar') }}
                </x-secondary-button>
            </a>

        </div>

    </div>


</x-app-layout>

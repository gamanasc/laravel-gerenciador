<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Editar projeto: "{{$projeto->titulo}}"
        </h2>
    </x-slot>


    <div class="py-12">

        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            @isset($mensagemSucesso)
                <div class="p-4 text-sm text-gray-800 rounded-lg bg-gray-50 dark:bg-gray-800 dark:text-gray-300 mb-4"
                    role="alert">
                    <span class="font-medium">{{ $mensagemSucesso }}</span>
                </div>
            @endisset

            @isset($mensagemErro)
                <div class="p-4 text-sm text-red-500 rounded-lg bg-red-50 dark:bg-red-800 dark:text-red-300 mb-4">
                    <span class="font-medium">{{ $mensagemErro }}</span>
                </div>
            @endisset



    <x-projetos.form
        action="{{ route('projetos.update', $projeto->id) }}"
        titulo="{{ $projeto->titulo }}"
        descricao="{{ $projeto->descricao }}"
    />

    <a href="{{ route('projetos.index') }}">
        <x-secondary-button class="mx-1 my-4">
            {{ __('Cancelar') }}
        </x-secondary-button>
    </a>

</div>

</div>


</x-app-layout>

<x-app-layout>
    <x-slot name="header">

        <div class="d-flex justify-content-between align-items-start w-100">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Projetos') }}
            </h2>

            <a href="{{ route('projetos.create') }}" >
                <x-primary-button class="mx-1">
                    {{ __('Adicionar') }}
                </x-primary-button>
            </a>
        </div>

    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            @isset($mensagemSucesso)
            <div class="p-4 text-sm text-gray-800 rounded-lg bg-gray-50 dark:bg-gray-800 dark:text-gray-300 mb-4" role="alert">
                <span class="font-medium">{{ $mensagemSucesso }}</span>
            </div>
            @endisset

            @isset($mensagemErro)
            <div class="p-4 text-sm text-gray-800 rounded-lg bg-gray-50 dark:bg-gray-800 dark:text-gray-300 mb-4">
                <span class="font-medium">{{ $mensagemErro }}</span>
            </div>
            @endisset


            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="bg-white shadow overflow-hidden sm:rounded-lg">
                    <ul class="divide-y divide-gray-200 p-0 m-0">
                        @foreach ($projetos as $projeto)
                            <li class="flex justify-between items-center p-4">
                                <span class="text-sm">
                                    <span class="text-lg font-semibold text-gray-900">{{ $projeto->titulo }}</span><br>
                                    <small class="text-gray-600">{{ $projeto->descricao }}</small>
                                </span>

                                <span class="flex space-x-2">

                                    <a href="{{ route('projetos.show', $projeto->id) }}">
                                        <x-secondary-button class="mx-1">
                                            {{ __('Ver') }}
                                        </x-secondary-button>
                                    </a>

                                    <a href="{{ route('projetos.edit', $projeto->id) }}">
                                        <x-primary-button class="mx-1">
                                            {{ __('Editar') }}
                                        </x-primary-button>
                                    </a>

                                    <form action="{{ route('projetos.destroy', $projeto->id) }}" method="post">
                                        @csrf

                                        <x-danger-button class="mx-1">
                                            {{ __('Remover') }}
                                        </x-danger-button>
                                    </form>
                                </span>
                            </li>
                        @endforeach
                    </ul>
                </div>


            </div>
        </div>
    </div>
</x-app-layout>



{{-- Tag personalizada para referenciar o layout padrão, com o título "Projetos" --}}
{{-- <x-layout title="Projetos">



</x-layout> --}}

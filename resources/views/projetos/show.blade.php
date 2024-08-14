<x-app-layout>
    <x-slot name="header">

        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{$projeto->titulo}}
        </h2>

    </x-slot>


    <div class="py-12">

        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

        <h3 class="mb-4">Descrição do projeto</h3>
        <p class="mb-5">{{$projeto->descricao}}</p>


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

            <h3 class="mb-4 d-flex justify-content-between align-items-center">
                <span>Tarefas do projeto</span>
                <a href="{{ route('tarefas.create', $projeto->id) }}" >
                    <x-primary-button class="mx-1">
                        {{ __('Adicionar') }}
                    </x-primary-button>
                </a>
            </h3>

            {{-- <a href="{{ route('tarefas.export') }}" rel="noopener noreferrer">Exportar Planilha</a> --}}

            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="bg-white shadow overflow-hidden sm:rounded-lg">
                    <ul class="divide-y divide-gray-200 p-0 m-0">

                        @if(!$projeto->tasks->isEmpty())

                        @foreach ($projeto->tasks as $task)
                                <li class="flex justify-between items-center p-4">
                                    <span class="text-sm">
                                        <span class="text-lg font-semibold text-gray-900">{{ $task->titulo }}</span><br>
                                        <small class="text-gray-600">{{ $task->descricao }}</small>
                                    </span>

                                    <span class="flex space-x-2">

                                        <a href="{{ route('tarefas.show', $task->id) }}">
                                            <x-secondary-button class="mx-1">
                                                {{ __('Ver') }}
                                            </x-secondary-button>
                                        </a>

                                        <a href="{{ route('tarefas.edit', $task->id) }}">
                                            <x-primary-button class="mx-1">
                                                {{ __('Editar') }}
                                            </x-primary-button>
                                        </a>

                                        <form action="{{ route('tarefas.destroy', $task->id) }}" method="post">
                                            @csrf

                                            <x-danger-button class="mx-1">
                                                {{ __('Remover') }}
                                            </x-danger-button>
                                        </form>
                                    </span>
                                </li>


                        @endforeach

                        @else

                        <li class="flex justify-between items-center p-4">
                            <span class="text-sm">
                                <span class="text-lg font-semibold text-gray-900 mb-4">Não há tarefas vinculadas ao projeto</span><br>
                                <span class="text-sm text-gray-600">Clique em adicionar para criar tarefas.</span>
                            </span>

                        </li>

                        @endif
                    </ul>
                </div>


            </div>

            <a href="{{ route('projetos.index') }}">
                <x-secondary-button class="mx-1 my-4">
                    {{ __('Voltar') }}
                </x-secondary-button>
            </a>

        </div>

    </div>


</x-app-layout>

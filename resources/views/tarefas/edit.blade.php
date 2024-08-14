    <x-app-layout>
        <x-slot name="header">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Editar tarefa '{{ $tarefa->titulo }}
            </h2>
        </x-slot>


        <div class="py-12">

            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <x-tarefas.form action="{{ route('tarefas.update', $tarefa->id) }}" projectId="{{ $tarefa->project_id }}"
                    titulo="{{ $tarefa->titulo }}" descricao="{{ $tarefa->descricao }}" status="{{ $tarefa->status }}"
                    dtVencimento="{{ $tarefa->dt_vencimento }}" />


                <div class="flex items-center justify-end mt-2">
                    <a href="{{ route('projetos.show', $tarefa->project_id) }}">
                        <x-secondary-button class="mx-1 my-4">
                            {{ __('Cancelar') }}
                        </x-secondary-button>
                    </a>
                </div>

            </div>

        </div>


    </x-app-layout>

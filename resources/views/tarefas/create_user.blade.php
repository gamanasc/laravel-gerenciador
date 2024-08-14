<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Adicionar usuário à tarefa "{{ $tarefa->titulo }}"
        </h2>
    </x-slot>

    <div class="py-12">

        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            @if (!$usuarios->isEmpty())

                <form action="{{ route('tarefas.store_user') }}" method="post">
                    @csrf <!-- Proteção contra cross site request forgery -->

                    <input type="hidden" name="task_id" value="{{ $tarefa->id }}">

                    <label for="user" class="form-label">Usuário:</label>
                    <select class="w-100 rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" id="user" name="user_id" aria-label="Default select example"
                        autofocus required>
                        <option selected>[Selecione]</option>
                        @foreach ($usuarios as $usuario)
                            <option value="{{ $usuario->id }}">{{ $usuario->name }} - {{ $usuario->email }}</option>
                        @endforeach
                    </select>

                    <div class="flex items-center justify-end mt-4">

                        <x-primary-button class="ms-4">
                            Enviar
                        </x-primary-button>
                    </div>
                </form>
            @else
                <h5 class="my-5">Não há usuários disponíveis para essa tarefa no momento</h5>
            @endif


            <a href="{{ route('tarefas.show', $tarefa->id) }}">
                <x-secondary-button class="mx-1 my-4">
                    {{ __('Cancelar') }}
                </x-secondary-button>
            </a>

        </div>

    </div>


</x-app-layout>

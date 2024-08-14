<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Painel') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">

                <h2>Exportações</h2>
                <hr>
                <h4 class="mb-4">Tarefas</h4>

                <form action="{{ route('tarefas.export') }}" method="post" class="flex align-items-center justify-content-between space-x-2">
                    @csrf <!-- Proteção contra cross site request forgery -->

                    <label for="status" class="form-label me-4">Status:</label>
                    <select class="w-100 rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" id="status" name="status" autofocus required>
                        <option value="" selected>[Selecione]</option>
                        <option value="Pendente">Pendentes</option>
                        <option value="Em Progresso">Em progresso</option>
                        <option value="Concluída">Concluídas</option>
                    </select>

                    <div class="flex items-center justify-end">

                        <x-primary-button class="ms-lg-4 mt-3 mt-lg-0">
                            Enviar
                        </x-primary-button>
                    </div>
                </form>

            </div>

            </div>
        </div>
    </div>
</x-app-layout>

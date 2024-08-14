{{-- <x-layout title="{{ $projeto->titulo }}: Adicionar tarefa"> --}}

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Adicionar tarefa ao projeto "{{ $projeto->titulo }}"
        </h2>
    </x-slot>


    <div class="py-12">

        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <x-tarefas.form :action="route('tarefas.store')" projectId="{{ $projeto->id }}" :titulo="old('titulo')" :descricao="old('descricao')"
                :status="old('status')" :dtVencimento="old('dt_vencimento')" />

            <div class="flex items-center justify-end mt-2">
                <a href="{{ route('projetos.show', $projeto->id) }}">
                    <x-secondary-button class="mx-1 my-4">
                        {{ __('Cancelar') }}
                    </x-secondary-button>
                </a>
            </div>

        </div>

    </div>


</x-app-layout>

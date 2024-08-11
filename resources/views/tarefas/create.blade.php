<x-layout title="{{ $projeto->titulo }}: Adicionar tarefa">
    <x-tarefas.form
        :action="route('tarefas.store')"
        projectId="{{$projeto->id}}"
        :titulo="old('titulo')"
        :descricao="old('descricao')"
        :status="old('status')"
        :dt_vencimento="old('dt_vencimento')"
        />

    <a href="{{ route('tarefas.index') }}" class="btn btn-link px-0">Cancelar</a>

</x-layout>

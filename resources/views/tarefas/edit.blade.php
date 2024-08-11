<x-layout title="Editar tarefa '{{ $tarefa->titulo }}'">
    <x-tarefas.form
        action="{{ route('tarefas.update', $tarefa->id) }}"
        projectId="{{$tarefa->project_id}}"
        titulo="{{ $tarefa->titulo }}"
        descricao="{{ $tarefa->descricao }}"
        status="{{ $tarefa->status }}"
        dtVencimento="{{ $tarefa->dt_vencimento }}"
    />

    <a href="{{ route('tarefas.index') }}" class="btn btn-link px-0">Cancelar</a>
</x-layout>

<x-layout title="{{ $tarefa->titulo }}: Adicionar usuário à tarefa">
    @if(!$usuarios->isEmpty())

    <form action="{{ route('tarefas.store_user') }}" method="post">
        @csrf <!-- Proteção contra cross site request forgery -->

        <input type="hidden" name="task_id" value="{{ $tarefa->id }}">

        <label for="user" class="form-label">Usuário:</label>
        <select class="form-select" id="user" name="user_id" aria-label="Default select example" autofocus required>
            <option selected>[Selecione]</option>
            @foreach ($usuarios as $usuario)
                <option value="{{ $usuario->id }}">{{ $usuario->name }} - {{ $usuario->email }}</option>
            @endforeach
          </select>

        <input type="submit" class="my-3 btn btn-primary" value="Enviar">
    </form>
    @else
    <h5 class="my-5">Não há usuários disponíveis para essa tarefa no momento</h5>
    @endif


    <a href="{{ route('tarefas.show', $tarefa->id) }}" class="btn btn-link px-0">Cancelar</a>

</x-layout>

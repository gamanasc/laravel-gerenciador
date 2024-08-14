{{-- Tag personalizada para referenciar o layout padrão, com o título "Projetos" --}}
{{-- <x-layout title="{{$tarefa->titulo}}">

    <hr>
    <p class="mb-5">{{$tarefa->descricao}}</p>

    <h3 class="mb-4 d-flex justify-content-between align-items-center">
        <span>Usuários vinculados à tarefa</span>
        <a href="{{ route('tarefas.create_user', $tarefa->id) }}" class="btn btn-primary">Adicionar</a>
    </h3> --}}
    <x-app-layout>
        <x-slot name="header">

            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{$tarefa->titulo}}
            </h2>

        </x-slot>


        <div class="py-12">

            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <h3 class="mb-4">Descrição da tarefa</h3>
            <p class="mb-5">{{$tarefa->descricao}}</p>


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
                    <span>Usuários vinculados à tarefa</span>
                    <a href="{{ route('tarefas.create_user', $tarefa->id) }}" >
                        <x-primary-button class="mx-1">
                            {{ __('Adicionar') }}
                        </x-primary-button>
                    </a>
                </h3>


                {{--  --}}
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="bg-white shadow overflow-hidden sm:rounded-lg">
                        <ul class="divide-y divide-gray-200 p-0 m-0">
                            @if(!$tarefa->users->isEmpty())

                            @foreach ($tarefa->users as $user)
                                    <li class="flex justify-between items-center p-4">
                                        <span class="text-sm">
                                            <span class="text-lg font-semibold text-gray-900">{{ $user->name }}</span><br>
                                            <span class="text-sm text-gray-600">{{ $user->email }}</span>
                                        </span>

                                        <span class="flex space-x-2">

                                            <form action="{{ route('tarefas.destroy_user', ['task_id' => $tarefa->id, 'user_id' => $user->id]) }}" method="post">
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
                                    <span class="text-lg font-semibold text-gray-900 mb-4">Não há usuários vinculados à tarefa</span><br>
                                    <span class="text-sm text-gray-600">Clique em adicionar para vincular usuários.</span>
                                </span>

                            </li>

                            @endif
                        </ul>
                    </div>


                </div>
                {{--  --}}


<a href="{{ route('projetos.show', $tarefa->project_id) }}">
    <x-secondary-button class="mx-1 my-4">
        {{ __('Voltar') }}
    </x-secondary-button>
</a>

</div>

</div>


</x-app-layout>

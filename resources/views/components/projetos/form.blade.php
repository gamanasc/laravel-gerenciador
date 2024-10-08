<form method="POST" action="{{ $action }}">
    @csrf <!-- Proteção contra cross site request forgery -->

    <!-- Título -->
    <div>
        <x-input-label for="titulo" :value="__('Título')" />
        <x-text-input id="titulo" class="block mt-1 w-full" type="text" name="titulo" value="{{$titulo}}" required autofocus autocomplete="titulo" />
        <x-input-error :messages="$errors->get('titulo')" class="mt-2" />
    </div>

    <!-- Descrição -->
    <div class="mt-4">
        <x-input-label for="descricao" :value="__('Descrição')" />
        <x-text-input id="descricao" class="block mt-1 w-full" type="text" name="descricao" value="{{$descricao}}" required autofocus autocomplete="descricao" />
        <x-input-error :messages="$errors->get('descricao')" class="mt-2" />
    </div>


    <div class="flex items-center justify-end mt-4">

        <x-primary-button class="ms-4">
            {{$textoBotao}}
        </x-primary-button>
    </div>
</form>

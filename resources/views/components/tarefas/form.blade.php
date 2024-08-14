<form action="{{ $action }}" method="post">
    @csrf <!-- Proteção contra cross site request forgery -->

    <input @isset($projectId)value="{{ $projectId }}"@endisset type="hidden" class="form-control" name="project_id" id="project_id">

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

    <!-- Status -->
    <div class="mt-4">
        <x-input-label for="status" :value="__('Status')" />
        <x-text-input id="status" class="block mt-1 w-full" type="text" name="status" value="{{$status}}" required autofocus autocomplete="status" />
        <x-input-error :messages="$errors->get('status')" class="mt-2" />
    </div>

    <!-- Data de vencimento -->
    <div class="mt-4">
        <x-input-label for="dt_vencimento" :value="__('Data de vencimento')" />
        <x-text-input id="dt_vencimento" class="block mt-1 w-full" type="date" name="dt_vencimento" value="{{$dtVencimento}}" required autofocus autocomplete="dt_vencimento" />
        <x-input-error :messages="$errors->get('dt_vencimento')" class="mt-2" />
    </div>

    {{-- <label for="status" class="form-label">Status:</label>
    <input @isset($status)value="{{ $status }}"@endisset type="text" class="form-control" name="status" id="status">

    <label for="dt_vencimento" class="form-label">Data de vencimento:</label>
    <input @isset($dtVencimento)value="{{ $dtVencimento }}"@endisset type="date" class="form-control" name="dt_vencimento" id="dt_vencimento"> --}}

    <div class="flex items-center justify-end mt-4">

        <x-primary-button class="ms-4">
            Enviar
        </x-primary-button>
    </div>
</form>

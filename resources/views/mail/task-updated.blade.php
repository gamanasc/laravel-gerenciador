@component('mail::message')
# A tarefa "{{ $taskName }}" foi atualizada!

Uma tarefa que você está vinculado foi atualizada.

@component('mail::button', ['url' => route('login')])
    Acessar
@endcomponent

@endcomponent


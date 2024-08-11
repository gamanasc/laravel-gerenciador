{{-- Layout padrão da aplicação --}}

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>
        {{-- Título fornecido na chamada desse layout --}}
        {{$title}}
    </title>
    <link rel="stylesheet" href="{{ asset('/css/app.css') }}">
</head>
<body>
    <div class="container">
        <h1>{!! $title !!}</h1>

        <div class="w-100 bg-light p-3 my-3 d-flex justify-content-end">
            <a href="{{ route('logout') }}" class="text-dark">Sair</a>
        </div>


        {{-- Mensagem de erro, se houver --}}
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        {{-- Conteúdo variável --}}
        {{ $slot }}
    </div>
</body>
</html>

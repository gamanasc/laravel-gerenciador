<form action="{{ $action }}" method="post">
    @csrf <!-- Proteção contra cross site request forgery -->
    <label for="titulo" class="form-label">Título:</label>
    <input @isset($titulo)value="{{ $titulo}}"@endisset type="text" class="form-control" name="titulo" id="titulo">

    <label for="titulo" class="form-label">Descrição:</label>
    <input @isset($descricao)value="{{ $descricao}}"@endisset type="text" class="form-control" name="descricao" id="descricao">

    <input type="submit" class="my-3 btn btn-primary" value="Enviar">
</form>

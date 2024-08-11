<form action="{{ $action }}" method="post">
    @csrf <!-- Proteção contra cross site request forgery -->

    <input @isset($projectId)value="{{ $projectId }}"@endisset type="hidden" class="form-control" name="project_id" id="project_id">

    <label for="titulo" class="form-label">Título:</label>
    <input @isset($titulo)value="{{ $titulo }}"@endisset type="text" class="form-control" name="titulo" id="titulo" autofocus>

    <label for="descricao" class="form-label">Descrição:</label>
    <input @isset($descricao)value="{{ $descricao }}"@endisset type="text" class="form-control" name="descricao" id="descricao">

    <label for="status" class="form-label">Status:</label>
    <input @isset($status)value="{{ $status }}"@endisset type="text" class="form-control" name="status" id="status">

    <label for="dt_vencimento" class="form-label">Data de vencimento:</label>
    <input @isset($dt_vencimento)value="{{ $dt_vencimento }}"@endisset type="date" class="form-control" name="dt_vencimento" id="dt_vencimento">

    <input type="submit" class="my-3 btn btn-primary" value="Enviar">
</form>

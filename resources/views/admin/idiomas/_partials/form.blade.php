@if ($errors->any())
    <div class="error-form-container">
        <p class="info">Formulário inválido. Foram encontrados os seguintes erros:</p>
        <ul class="error-form-list">
            @foreach ($errors->all() as $error)
                <li class="error-form">
                    {{ $error }}
                </li>
            @endforeach
        </ul>
    </div>
@endif

<form action="{{ $action }}" method="POST">
    @csrf
    @method($method ?? 'POST')

    <input type="hidden" name="id" value="{{ $idioma->id ?? null }}">

    <div class="form-row">
        <div class="form-group col-md-6">
            <label for="nome">Nome <span class="req">*</span></label>
            <input type="text" name="nome" id="nome" class="form-control" aria-describedby="nomeHelp"
                value="{{ $idioma->nome ?? old('nome') }}">
            <small id="nomeHelp" class="form-text text-muted">Nome do idioma exibido aos usuários
                (deve ser único).</small>
        </div>

        <div class="form-group col-md-6">
            <label for="num_falantes">Número de Falantes</label>
            <input type="number" min=0 name="num_falantes" id="num_falantes" class="form-control"
                aria-describedby="num_falantesHelp" value="{{ $idioma->num_falantes ?? old('num_falantes') }}">
            <small id="num_falantesHelp" class="form-text text-muted">Número de total de falantes do idioma.</small>
        </div>
    </div>

    <button class="btn primary-button block" type="submit">ENVIAR</button>
</form>

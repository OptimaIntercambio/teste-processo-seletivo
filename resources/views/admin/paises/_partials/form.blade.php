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

<form action="{{ $action }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method($method ?? 'POST')

    <input type="hidden" name="id" value="{{ $pais->id ?? null }}">

    <div class="form-group">
        <label for="nome">Nome <span class="req">*</span></label>
        <input type="text" name="nome" id="nome" class="form-control" aria-describedby="nomeHelp"
            value="{{ $pais->nome ?? old('nome') }}">
        <small id="nomeHelp" class="form-text text-muted">Nome do país exibido aos usuários
            (deve ser único).</small>
    </div>

    <div class="form-row">
        <div class="form-group col-md-4">
            <label for="populacao">População</label>
            <input type="number" min=0 name="populacao" id="populacao" class="form-control"
                aria-describedby="populacaoHelp" value="{{ $pais->populacao ?? old('populacao') }}">
            <small id="populacaoHelp" class="form-text text-muted">Total de habitantes do país.</small>
        </div>

        <div class="form-group col-md-4">
            <label for="pib">PIB</label>
            <input type="number" min=0 step="any" name="pib" id="pib" class="form-control" aria-describedby="pibHelp"
                value="{{ $pais->pib ?? old('pib') }}">
            <small id="pibHelp" class="form-text text-muted">Produto Interno Bruto do país (em trilhão USD).</small>
        </div>

        <div class="form-group col-md-4">
            <label for="idh">IDH</label>
            <input type="number" min=0 step="any" name="idh" id="idh" class="form-control" aria-describedby="idhHelp"
                value="{{ $pais->idh ?? old('idh') }}">
            <small id="idhHelp" class="form-text text-muted">Índice de Desenvolvimento Humano do
                país.</small>
        </div>
    </div>

    <div class="form-group">
        <label for="resumo">Resumo</label>
        <textarea name="resumo" rows="3" id="resumo" class="form-control"
            aria-describedby="resumoHelp">{{ $pais->resumo ?? old('resumo') }}</textarea>
        <small id="resumoHelp" class="form-text text-muted">Breve descrição a respeito do
            país.</small>
    </div>

    <div class="form-group">
        <label for="descricao">Descrição</label>
        <textarea name="descricao" rows="3" id="descricao" class="form-control"
            aria-describedby="descricaoHelp">{{ $pais->descricao ?? old('descricao') }}</textarea>
        <small id="descricaoHelp" class="form-text text-muted">Descrição completa apresentada sobre
            o país.</small>
    </div>

    <div class="form-group">
        <label for="bandeira">Bandeira do País</label>
        <input type="file" name="bandeira" class="form-control-file" id="bandeira">
    </div>

    <div class="form-group">
        <label for="imagem">Imagem de Apresentação</label>
        <input type="file" name="imagem" class="form-control-file" id="imagem">
    </div>

    <div class="form-group">
        <label for="idiomas">Idiomas</label>
        <select multiple class="form-control" name="idiomas[]" id="idiomas">
            @foreach ($idiomas as $idioma)
                <option value="{{ $idioma->id }}"
                    {{ !empty($idiomas_pais) && in_array($idioma->id, $idiomas_pais) ? 'selected' : '' }}>
                    {{ $idioma->nome }}
                </option>
            @endforeach
        </select>
    </div>

    <button class="btn primary-button block" type="submit">ENVIAR</button>
</form>

<script src="{{ asset('assets/bsmultiselect/dist/js/BsMultiSelect.min.js') }}"></script>

<script>
    $(function() {
        // Aplica formatação no select
        $("select[multiple]").bsMultiSelect();
    });

</script>

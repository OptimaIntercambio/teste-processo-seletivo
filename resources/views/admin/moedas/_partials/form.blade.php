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

    <input type="hidden" name="id" value="{{ $moeda->id ?? null }}">

    <div class="form-row">
        <div class="form-group col-md-6">
            <label for="nome">Nome <span class="req">*</span></label>
            <input type="text" required name="nome" id="nome" class="form-control" aria-describedby="nomeHelp"
                value="{{ $moeda->nome ?? old('nome') }}">
            <small id="nomeHelp" class="form-text text-muted">Nome da moeda exibido aos usuários
                (deve ser único).</small>
        </div>

        <div class="form-group col-md-6">
            <label for="codigo">Código <span class="req">*</span></label>
            <select class="form-control" required name="codigo" id="codigo">
                @foreach ($api_codigos as $codigo)
                    <option value="{{ $codigo }}"
                        {{ isset($moeda->codigo) && $codigo == $moeda->codigo ? 'selected' : '' }}>
                        {{ $codigo }}
                    </option>
                @endforeach
            </select>
        </div>
    </div>

    <button class="btn primary-button block" type="submit">ENVIAR</button>
</form>

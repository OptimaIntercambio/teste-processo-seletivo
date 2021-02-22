<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Cadastro de Países') }}
        </h2>
    </x-slot>

    <div class="py-2">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <article class="p-4 bg-white border-b border-gray-200">
                    <p id="page-description" class="lead">Digite abaixo as informações a respeito do novo país:</p>
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
                    <form action="{{ route('paises.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <div class="form-group">
                            <label for="nome">Nome <span class="req">*</span></label>
                            <input type="text" name="nome" id="nome" class="form-control"
                                aria-describedby="nomeHelp" value="{{ old('nome') }}">
                            <small id="nomeHelp" class="form-text text-muted">Nome do país exibido aos usuários
                                (deve ser único).</small>
                        </div>

                        <div class="form-row">
                            <div class="form-group col-md-4">
                                <label for="populacao">População</label>
                                <input type="number" min=0 name="populacao" id="populacao" class="form-control"
                                    aria-describedby="populacaoHelp" value="{{ old('populacao') }}">
                                <small id="populacaoHelp" class="form-text text-muted">Total de habitantes do país.</small>
                            </div>

                            <div class="form-group col-md-4">
                                <label for="pib">PIB</label>
                                <input type="number" min=0 step="any" name="pib" id="pib" class="form-control"
                                    aria-describedby="pibHelp" value="{{ old('pib') }}">
                                <small id="pibHelp" class="form-text text-muted">Produto Interno Bruto do país (em trilhão USD).</small>
                            </div>

                            <div class="form-group col-md-4">
                                <label for="idh">IDH</label>
                                <input type="number" min=0 step="any" name="idh" id="idh" class="form-control"
                                    aria-describedby="idhHelp" value="{{ old('idh') }}">
                                <small id="idhHelp" class="form-text text-muted">Índice de Desenvolvimento Humano do
                                    país.</small>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="resumo">Resumo</label>
                            <textarea name="resumo" rows="3" id="resumo" class="form-control"
                                aria-describedby="resumoHelp">{{ old('resumo') }}</textarea>
                            <small id="resumoHelp" class="form-text text-muted">Breve descrição a respeito do
                                país.</small>
                        </div>

                        <div class="form-group">
                            <label for="descricao">Descrição</label>
                            <textarea name="descricao" rows="3" id="descricao" class="form-control"
                                aria-describedby="descricaoHelp">{{ old('descricao') }}</textarea>
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

                        <button class="btn primary-button block" type="submit">ENVIAR</button>
                    </form>
                </article>
            </div>
        </div>
    </div>
</x-app-layout>

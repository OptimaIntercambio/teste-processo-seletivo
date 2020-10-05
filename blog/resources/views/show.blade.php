@extends('templates.template')

@section('content')
<h1 class="text-center"> Visualizar Dados </h1><hr>

    
<div class="col-8" ma-auto>
    @php
        $idioma = $pais->find($pais->id)->relationPaises;
        @endphp
        Pais: {{$pais->nomePais}}<br>
        Idioma: {{$idioma->nome}}<br>
        Sigla: {{$idioma->sigla}}<br>
</div>
@endsection
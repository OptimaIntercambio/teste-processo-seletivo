                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                        @extends('templates.template')
 
@section('content')
<h1 class="text-center">@if(isset($pais)) Editar @else Cadastrar @endif</h1><hr>

<div class="col-8" ma-auto>

    @if(isset($pais))
        <form name="formEdit" id="formEdit" method="post" action="{{url("paises/$pais->id")}}">
        @method('PUT')
    @else
        <form name="formCad" id="formCad" method="post" action="{{url('paises')}}">
    @endif    
            @csrf <!--token de segurança-->
            <input class="form-control" type="text" name="nomePais" id="nomePais" placeholder="Nome do país" value="{{$pais->nomePais ?? ''}}"><br>
            <select class="form-control" name="id_idioma" id="id_idioma">
                <option value="{{$pais->relationIdiomas->id ?? ''}}">{{$pais->relationIdiomas->nome ?? 'Idiomas'}}</option>
                @foreach($idiomas as $idioma)
                <option value="{{$idioma->id}}">{{$idioma->nome}}</option>
                @endforeach
            </select>
            <br>    
            <input class="btn btn-primary" type="submit" value="@if(isset($pais)) Editar @else Cadastrar @endif">
        </form>
</div>
@endsection
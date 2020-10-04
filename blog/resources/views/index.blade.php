@extends('templates.template')

@section('content')
<h1 class="text-center"> Optima Intercâmbio </h1><hr>

<div class="text-center mt-3 mb-4">
    <a href="{{url('paises/create')}}">
        <button class="btn btn-success">CADASTRAR</button>
    </a>
</div>

<div class="col-8" ma-auto>
    @csrf
    <table class="table text-center">
        <thead class="thead-dark">
            <tr>
                <th scope="col">Id</th>
                <th scope="col">Paises</th>
                <th scope="col">Idioma</th>
                <th scope="col">&nbsp;&nbsp;&nbsp;&nbsp;Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($pais as $paises)
            @php
            $idioma = $paises->find($paises->id)->relationPaises;
            @endphp
            <tr>
                <th scope="row">{{$paises -> id}}</th>
                <td>{{$paises -> nomePais}}</td>
                <td>{{$idioma -> nome}}</td>
                <td>
                    <a href="{{url("paises/$paises->id")}}"> <!--rota-->
                       <button class="btn btn-dark">Visualizar</button>
                    </a>
                    <a href="{{url("paises/$paises->id/edit")}}">
                       <button class="btn btn-primary">Editar</button>
                    </a>
                    <a href="{{url("paises/$paises->id")}}" class="js-del">
                       <button class="btn btn-danger">Deletar</button>
                    </a>
                </td>
            </tr>
            @endforeach

        </tbody>
    </table>
</table>

<table class="table">
    <thead class="thead-light">
        </tbody>
        
</table>
{{$pais->links()}}
</div>
@endsection
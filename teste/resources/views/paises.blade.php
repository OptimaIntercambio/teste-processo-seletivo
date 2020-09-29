@extends('templates.estrutura-simples')

@section('title')
Países
@endsection

@section('body')
<div class="container">
    <div class="row">
        <div class="col">
            <h1>Países</h1>
            <p>Manutenção dos países.</p>
        </div>

        @if(isset($errors) && count($errors) > 0)
        <div class="col"><div class="text-center mt-4 mb-4 p-2 alert-danger">
            @foreach($errors->all() as $erro)
                {{$erro}}<br>
            @endforeach
        </div></div>
        @endif

    </div>

    <div class="row">
        <div class="col-sm-12 col-md-12 col-lg-7">

            <h3>Lista</h3>

            <div id="url" style="display: none;">{{url('paises')}}</div>
            @csrf
            
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Nome</th>
                        <th scope="col">Idioma</th>
                        <th scope="col">Data</th>
                        <th scope="col" style="width: 130px;">Ações</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($paises as $pais)

                    @php

                    // Procura os idiomas do país (um idioma).
                    $idioma=$pais->find($pais->id)->relIdiomas;

                    @endphp


                    @isset($pais_show)
                    @if ($pais_show->id == $pais->id)
                    <tr class="badge-info">
                        @else
                    <tr>
                        @endif
                        @endisset

                        <th scope="row">{{$pais->id}}</th>
                        <td>{{$pais->name}}</td>
                        <td>{{$idioma->name}}</td>
                        <td>{{$pais->updated_at}}</td>
                        <td>
                            <a href="{{url("paises/$pais->id")}}">
                                <button class="btn btn-info btn-sm mb-1">
                                    <i class="fas fa-eye"></i>
                                </button>
                            </a>
                            <a href="{{url("paises/$pais->id/edit")}}">
                                <button class="btn btn-warning btn-sm mb-1">
                                    <i class="fas fa-edit"></i>
                                </button>
                            </a>
                            <a href="{{url("paises/$pais->id")}}" class="deletar">
                                <button class="btn btn-danger btn-sm mb-1">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </a>
                        </td>
                    </tr>

                    @endforeach

                </tbody>
            </table>
        </div>
        <div class="col-sm-12 col-md-12 col-lg-5">

            <h3>Formulário</h3>

            @if (isset($editar))
            <form name="form" method="POST" action="{{url("paises/$pais_edit->id")}}">
            @method('PUT')

            @else
            <form name="form" method="POST" action="{{url('paises')}}">
            @endif
            

                @csrf

                <div class="form-group">
                    <label for="inputname">País</label>
                    <input name="name" type="text" class="form-control" id="inputname" aria-describedby="nameHelp" placeholder="país" value="{{$pais_edit->name ?? '' }}" required>
                    <small id="nameHelp" class="form-text text-muted">Nome do país</small>
                </div>
                <div class="form-group">
                    <label for="inputidioma">Idioma</label>
                    <select name="id_idioma" class="form-control" id="inputidioma" aria-describedby="idiomaHelp" required>


                        @foreach($idiomas as $idioma)
                        @if (isset($editar))
                        <option value="{{$idioma_edit->id}}">{{$idioma_edit->name}}</option>
                        @else
                        <option value="{{$idioma->id}}">{{$idioma->name}}</option>
                        @endif
                        @endforeach

                    </select>
                    <small id="idiomaHelp" class="form-text text-muted">Idioma do país</small>
                </div>
                <div class="text-right">
                    @if (isset($editar))
                    <input class="btn btn-warning" type="submit" name="btn" value="Atualizar">
                    @else
                    <input class="btn btn-success" type="submit" name="btn" value="Cadastrar">
                    @endif
                </div>
            </form>

        </div>
    </div>
</div>


@endsection
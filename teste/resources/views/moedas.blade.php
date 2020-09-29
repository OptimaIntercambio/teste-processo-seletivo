@extends('templates.estrutura-simples')

@section('title')
Moedas
@endsection

@section('body')
<div class="container">
	<div class="row">
		<div class="col">
			<h1>Moedas</h1>
			<p>Manutenção das moedas.</p>
		</div>

		@if(isset($errors) && count($errors) > 0)
		<div class="col">
			<div class="text-center mt-4 mb-4 p-2 alert-danger">
				@foreach($errors->all() as $erro)
				{{$erro}}<br>
				@endforeach
			</div>
		</div>
		@endif

	</div>

	<div class="row">
		<div class="col-sm-12 col-md-12 col-lg-7">

			<h3>Lista</h3>

			<div id="url" style="display: none;">{{url('moedas')}}</div>
			@csrf

			<table class="table table-hover">
				<thead>
					<tr>
						<th scope="col">#</th>
						<th scope="col">Nome</th>
						<th scope="col">Sigla</th>
						<th scope="col">Valor dolar</th>
						<th scope="col">Data</th>
						<th scope="col" style="width: 130px;">Ações</th>
					</tr>
				</thead>
				<tbody>

					@foreach($moedas as $moeda)

					@isset($moeda_show)
					@if ($moeda_show->id == $moeda->id)
					<tr class="badge-info">
						@else
					<tr>
						@endif
						@endisset

						<th scope="row">{{$moeda->id}}</th>
						<td>{{$moeda->name}}</td>
						<td>{{$moeda->sigla}}</td>
						<td>{{$moeda->dolar}}</td>
						<td>{{$moeda->updated_at}}</td>
						<td>
							<a href="{{url("moedas/$moeda->id")}}">
								<button class="btn btn-info btn-sm mb-1">
									<i class="fas fa-eye"></i>
								</button>
							</a>
							<a href="{{url("moedas/$moeda->id/edit")}}">
								<button class="btn btn-warning btn-sm mb-1">
									<i class="fas fa-edit"></i>
								</button>
							</a>
							<a href="{{url("moedas/$moeda->id")}}" class="deletar">
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
			<form name="form" method="POST" action="{{url("moedas/$moeda_edit->id")}}">
				@method('PUT')

				@else
				<form name="form" method="POST" action="{{url('moedas')}}">
					@endif


					@csrf

					<div class="form-group">
						<label for="inputname">Nome</label>
						<input name="name" type="text" class="form-control" id="inputname" aria-describedby="nameHelp" placeholder="Moeda" value="{{$moeda_edit->name ?? '' }}" required>
						<small id="nameHelp" class="form-text text-muted">Nome da moeda</small>
					</div>

					<div class="form-group">
						<label for="inputsigla">Sigla</label>
						<input name="sigla" type="text" class="form-control" id="inputsigla" aria-describedby="siglaHelp" placeholder="sigla" value="{{$moeda_edit->sigla ?? '' }}" required>
						<small id="siglaHelp" class="form-text text-muted">Nome da sigla</small>
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
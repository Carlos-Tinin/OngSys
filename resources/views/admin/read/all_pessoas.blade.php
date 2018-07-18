@extends('layouts.app')

@section('header')
<div class="row">
    <div class="col-md-9">
        <div class="jumbotron">
          <div class="container">
            <h1 class="display-4">Pessoas</h1>
            <p class="lead">Interface de gerenciamento de pessoas.</p>
          </div>
        </div>
    </div>
    <div class="col-md-3">
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{route('home')}}"><ion-icon name="bookmark"></ion-icon>Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">Pessoas</li>
          </ol>
        </nav>
    </div>
</div>
@endsection

@section('card')
<div class="card text-white bg-dark mb-3">
  <div class="card-body">
    <h5 class="card-title">Deseja adicionar mais pessoas a equipe?</h5>
    <a href="{{route('admin.create.pessoa')}}" class="btn btn-info">Cadastrar novas pessoas</a>
  </div>
</div>
@endsection

@section('content')
<div class="row">
	<div class="container">
		@if (session()->has('msg'))
		  @if (session('msg') == 'atualizada' || session('msg') == 'removida' || session('msg') == 'cadastrada' || session('msg') == 'inativada' || session('msg') == 'ativada')
		    <div class="alert alert-success alert-dismissible" role="alert">
		      <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
		      <strong>Sucesso!</strong> Pessoa {{session('msg')}} com sucesso!
		    </div>
		    @else
		    <div class="alert alert-danger alert-dismissible" role="alert">
		      <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
		      <strong>Erro!</strong> Houve um erro!
		    </div>
		  @endif
		@endif
		<table class="table">
		  <thead class="thead-light">
		    <tr>
		      <th scope="col">#</th>
		      <th scope="col">Nome</th>
		      <th scope="col">Informações</th>
		      <th scope="col">Ativo</th>
		      <th scope="col">Cargos</th>
		      <th scope="col">Ações</th>
		    </tr>
		  </thead>
		  <tbody>
		  	@forelse ($pessoas as $pessoa)
		    <tr>
		      <th scope="row">{{$loop->index}}</th>
		      <td>{{$pessoa->nome}}</td>
		      <td style="min-width: 180px;max-width: 250px; word-wrap: break-word; overflow-wrap: break-word;">{{$pessoa->informacao}}</td>
		      <td>
		      	@if ($pessoa->ativo == 1)
		      		Ativo
		      	@else 
		      		Inativo
		      	@endif
		      </td>
		      <td style="min-width: 150px;max-width: 200px; word-wrap: break-word; overflow-wrap: break-word;">
		      	@forelse($pessoa->cargos as $cargo)
		      		{{$cargo->nome}}
		      		@if(!$loop->last),@endif
		      	@empty
		      		Sem cargo!
		      	@endforelse
		      </td>
		      <td style="min-width: 180px;max-width: 250px;">
			      
			    <a href="{{route('admin.update.pessoa', ['id' => $pessoa->id])}}"><button style=" margin-right: 10px;" class="btn btn-primary">Alterar</button></a>

			    <a onclick="return confirm('Deseja realmente excluir?')" href="{{route('admin.remove.pessoa', ['id' => $pessoa->id])}}"><button style=" margin-right: 10px;" class="btn btn-danger">Excluir</button></a>

		      	@if ($pessoa->ativo == 1)
		      		<a href="{{route('admin.inativar.pessoa', ['id' => $pessoa->id])}}"><button style=" margin-right: 10px;" class="btn btn-warning">Inativar</button></a>
		      	@else
		      		<a href="{{route('admin.ativar.pessoa', ['id' => $pessoa->id])}}"><button style=" margin-right: 10px;" class="btn btn-warning">Ativar</button></a>
		      	@endif
		    </tr>
		    @empty
		    	<td colspan="6"><center>Sem pessoas!</center>
		    @endforelse
		  </tbody>
		</table>
		{{ $pessoas->links() }}
	</div>
</div>
@endsection
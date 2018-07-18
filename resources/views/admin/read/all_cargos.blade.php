@extends('layouts.app')

@section('header')
<div class="row">
    <div class="col-md-9">
        <div class="jumbotron">
          <div class="container">
            <h1 class="display-4">Cargos</h1>
            <p class="lead">Interface de gerenciamento de cargos.</p>
          </div>
        </div>
    </div>
    <div class="col-md-3">
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{route('home')}}"><ion-icon name="bookmark"></ion-icon>Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">Cargos</li>
          </ol>
        </nav>
    </div>
</div>
@endsection

@section('card')
<div class="card text-white bg-dark mb-3">
  <div class="card-body">
    <h5 class="card-title">Deseja adicionar mais cargos?</h5>
    <a href="{{route('admin.create.cargo')}}" class="btn btn-info">Cadastrar novos cargos</a>
  </div>
</div>
@endsection

@section('content')
<div class="row">
	<div class="container">
		@if (session()->has('msg'))
		  @if (session('msg') == 'atualizado' || session('msg') == 'removido' || session('msg') == 'cadastrado')
		    <div class="alert alert-success alert-dismissible" role="alert">
		      <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
		      <strong>Sucesso!</strong> Cargo {{session('msg')}} com sucesso!
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
		      <th scope="col">Descrição</th>
		      <th scope="col">Ações</th>
		    </tr>
		  </thead>
		  <tbody>
		  	@forelse ($cargos as $cargo)
		    <tr>
		      <th scope="row">{{$loop->index}}</th>
		      <td>{{$cargo->nome}}</td>
		      <td style="min-width: 180px;max-width: 250px; word-wrap: break-word; overflow-wrap: break-word;" >{{$cargo->descricao}}</td>
		      <td style="min-width: 280px;max-width: 280px;">
			      
			    <a href="{{route('admin.update.cargo', ['id' => $cargo->id])}}"><button style=" margin-right: 10px;" class="btn btn-primary">Alterar</button></a>

			    <a onclick="return confirm('Deseja realmente excluir?')" href="{{route('admin.remove.cargo', ['id' => $cargo->id])}}"><button style=" margin-right: 10px;" class="btn btn-danger">Excluir</button></a>
		    </tr>
		    @empty
		    	<td colspan="4"><center>Sem cargos!</center>
		    @endforelse
		  </tbody>
		</table>
		{{ $cargos->links() }}
	</div>
</div>
@endsection
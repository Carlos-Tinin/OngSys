@extends('layouts.app')

@section('header')
<div class="row">
    <div class="col-md-9">
        <div class="jumbotron">
          <div class="container">
            <h1 class="display-4">Serviços</h1>
            <p class="lead">Interface de gerenciamento de serviços.</p>
          </div>
        </div>
    </div>
    <div class="col-md-3">
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{route('home')}}"><ion-icon name="bookmark"></ion-icon>Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">Serviços</li>
          </ol>
        </nav>
    </div>
</div>
@endsection

@section('card')
<div class="card text-white bg-dark mb-3">
  <div class="card-body">
    <h5 class="card-title">Deseja adicionar mais serviços?</h5>
    <a href="{{route('admin.create.servico')}}" class="btn btn-info">Cadastrar novos serviços</a>
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
		      <strong>Sucesso!</strong> Serviço {{session('msg')}} com sucesso!
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
		      <th scope="col">Título</th>
		      <th scope="col">Descrição</th>
		      <th scope="col">Situação</th>
		      <th scope="col">Abertura</th>
		      <th scope="col">Fechamento</th>
		      <th scope="col">Pessoas</th>
		      <th scope="col">Ações</th>
		    </tr>
		  </thead>
		  <tbody>
		  	@forelse ($servicos as $servico)
		    <tr>
		      <th scope="row">{{$loop->index}}</th>
		      <td>{{$servico->titulo}}</td>
		      <td style="min-width: 180px;max-width: 250px; word-wrap: break-word; overflow-wrap: break-word;" >{{$servico->descricao}}</td>
		      <td>
		      	@if ($servico->ativo == 1)
		      		@if ($data < $servico->fechamento)
		      			<span class="badge badge-primary">Em execução</span>
		      		@elseif ($data == $servico->fechamento)
		      			<span class="badge badge-warning">Data de entrega</span>
		      		@elseif ($data > $servico->fechamento)		      		
		      			<span class="badge badge-danger">Atrasado</span>
		      		@endif
		      	@else 
		      		<span class="badge badge-success">Finalizado</span>
		      	@endif
		      </td>
		      <td style="min-width: 110px;">{{$servico->abertura}}</td>
		      <td style="min-width: 110px;">{{$servico->fechamento}}</td>
		      <td style="min-width: 150px;max-width: 200px; word-wrap: break-word; overflow-wrap: break-word;">
		      	@forelse($servico->pessoas as $pessoa)
		      		{{$pessoa->nome}}
		      		@if(!$loop->last),@endif
		      	@empty
		      		Sem pessoas!
		      	@endforelse
		      </td>
		      <td style="min-width: 290px;max-width: 290px;">
			      
			    <a href="{{route('admin.update.servico', ['id' => $servico->id])}}"><button style=" margin-right: 10px;" class="btn btn-primary">Alterar</button></a>

			    <a onclick="return confirm('Deseja realmente excluir?')" href="{{route('admin.remove.servico', ['id' => $servico->id])}}"><button style=" margin-right: 10px;" class="btn btn-danger">Excluir</button></a>

		      	@if ($servico->ativo == 1)
		      		<a href="{{route('admin.servico.fechar', ['id' => $servico->id])}}"><button style=" margin-right: 10px;" class="btn btn-warning">Fechar</button></a>
		      	@else
		      		<a href="{{route('admin.servico.abrir', ['id' => $servico->id])}}"><button style=" margin-right: 10px;" class="btn btn-warning">Reabrir</button></a>
		      	@endif
		    </tr>
		    @empty
		    	<td colspan="8"><center>Sem servicos!</center>
		    @endforelse
		  </tbody>
		</table>
		{{ $servicos->links() }}
	</div>
</div>
@endsection
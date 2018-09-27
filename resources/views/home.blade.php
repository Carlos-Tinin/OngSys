@extends('layouts.app')

@section('header')
<div class="row">
    <div class="col-md-9">
        <div class="jumbotron">
          <div class="container">
            <h1 class="display-4">OngSys</h1>
            <p class="lead">Gerencie as atividades da sua ONG.</p>
          </div>
        </div>
    </div>
    <div class="col-md-3">
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb">
            <li class="breadcrumb-item active" aria-current="page"><ion-icon name="bookmark"></ion-icon>Home</li>
          </ol>
        </nav>
    </div>
</div>
@endsection

@section('content')


<div class="row justify-content-center">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">Dashboard</div>

            <div class="card-body">
                @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                @endif
                
  <ul class="list-group">
  <a href="{{route('admin.menu.pessoa')}}">
    <li class="list-group-item list-group-item-success">Interface de gerenciamento de pessoas</li>
  </a>
  <a href="{{route('admin.read.all_servicos')}}">
    <li class="list-group-item list-group-item-success">Interface de gerenciamento de serviços</li>
  </a>
  <a href="{{route('admin.read.all_cargos')}}">
    <li class="list-group-item list-group-item-success">Interface de gerenciamento de cargos</li>
  </a>  
  </ul>  

              

               

                
            </div>
        </div>
    </div>
</div>
@endsection

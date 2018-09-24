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
                <div class="card w-50">
                  <div class="card-body">
                    <a href="{{route('admin.menu.pessoa')}}"><h5 class="card-title"><span class="badge badge-primary"><ion-icon name="person-add"></ion-icon> Pessoas</span></a> Interface de gerenciamento de pessoas.</h5>                    
                  </div>
                </div>

                <div class="card w-50">
                  <div class="card-body">
                    <a href="{{route('admin.read.all_servicos')}}"><h5 class="card-title"><span class="badge badge-primary"><ion-icon name="calendar"></ion-icon> Serviços</span></a> Interface de gerenciamento de serviços.</h5>                    
                  </div>
                </div>

                <div class="card w-50">
                  <div class="card-body">
                    <a href="{{route('admin.read.all_cargos')}}"><h5 class="card-title"><span class="badge badge-primary"><ion-icon name="contact"></ion-icon> Cargos</span></a> Interface de gerenciamento de cargos.</h5>                    
                  </div>
                </div>

                <div class="card w-50">
                  <div class="card-body">
                    <a href="{{route('register')}}"><h5 class="card-title"><span class="badge badge-primary"><ion-icon name="person-add"></ion-icon> Usuarios</span></a> Adicionar outro administrador.</h5>                    
                  </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

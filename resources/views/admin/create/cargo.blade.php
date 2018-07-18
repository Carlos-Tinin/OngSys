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
            <li class="breadcrumb-item"><a href="{{route('admin.read.all_cargos')}}">Cargos</a></li>
            <li class="breadcrumb-item active" aria-current="page">Cadastrar</li>
          </ol>
        </nav>
    </div>
</div>
@endsection

@section('content')
<div class="row justify-content-center">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">{{ __('Cadastro de cargos') }}</div>

            <div class="card-body">
                <form method="POST" action="{{ route('admin.create.cargo') }}" aria-label="{{ __('Register') }}">
                    @csrf

                    <div class="form-group row">
                        <label for="nome" class="col-md-4 col-form-label text-md-right">{{ __('Cargo') }}</label>

                        <div class="col-md-6">
                            <input id="nome" type="text" class="form-control{{ $errors->has('nome') ? ' is-invalid' : '' }}" name="nome" value="{{ old('nome') }}" required autofocus placeholder="Digite um nome para o cargo">

                            @if ($errors->has('nome'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('nome') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="info" class="col-md-4 col-form-label text-md-right">{{ __('Descrição') }}</label>

                        <div class="col-md-6">
                            <textarea id="info" rows="4" maxlength="150" class="form-control{{ $errors->has('info') ? ' is-invalid' : '' }}" name="info" value="{{ old('info') }}" required placeholder="Descrição geral sobre o cargo..."></textarea>

                            @if ($errors->has('info'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('info') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group row mb-0">
                        <div class="col-md-6 offset-md-4">
                            <button type="submit" class="btn btn-primary">
                                {{ __('Cadastrar') }}
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

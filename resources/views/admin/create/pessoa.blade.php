@extends('layouts.app')

@section('script')
<script type="text/javascript">
    jQuery(document).ready(function() {
        jQuery("#cargo").multiselect({
            nonSelectedText: 'Selecione um cargo',
            enableFiltering: true,
            enableCaseInsensitiveFiltering: true,
            buttonWidth: '330px'
        });
    });
</script>
@endsection

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
            <li class="breadcrumb-item"><a href="{{route('admin.read.all_pessoas')}}">Pessoas</a></li>
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
            <div class="card-header">{{ __('Cadastro de pessoas') }}</div>

            <div class="card-body">
                <form method="POST" action="{{ route('admin.create.pessoa') }}" aria-label="{{ __('Register') }}">
                    @csrf

                    <div class="form-group row">
                        <label for="nome" class="col-md-4 col-form-label text-md-right">{{ __('Nome') }}</label>

                        <div class="col-md-6">
                            <input id="nome" type="text" class="form-control{{ $errors->has('nome') ? ' is-invalid' : '' }}" name="nome" value="{{ old('nome') }}" required autofocus placeholder="Digite o nome da pessoa">

                            @if ($errors->has('nome'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('nome') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="cargo" class="col-md-4 col-form-label text-md-right">{{ __('Cargos') }}</label>

                        <div class="col-md-6">
                        	<select class="form-control" name="cargo[]" id="cargo" multiple required="">
                                    @forelse ($cargos as $cargo)
                                    	<option value="{{$cargo->id}}">{{strtoupper($cargo->nome)}}</option>
                                	@empty
                                		<option>Nenhum cargo cadastrado!</option>
                                	@endforelse
                            </select>

                            @if ($errors->has('cargo'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('cargo') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="info" class="col-md-4 col-form-label text-md-right">{{ __('Informações') }}</label>

                        <div class="col-md-6">
                            <textarea id="info" rows="4" maxlength="150" class="form-control{{ $errors->has('info') ? ' is-invalid' : '' }}" name="info" value="{{ old('info') }}" required placeholder="Informações gerais sobre a pessoa..."></textarea>

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

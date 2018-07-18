@extends('layouts.app')

@section('script')
<script type="text/javascript">
    jQuery(document).ready(function() {
    	var d = new Date();
    	month = d.getMonth() +1;
    	jQuery("#fechamento").attr("min", d.getFullYear()+ "-" + 0+month + "-" + d.getDate());

        jQuery("#pessoa").multiselect({
            nonSelectedText: 'Selecione as pessoa',
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
            <h1 class="display-4">Serviços</h1>
            <p class="lead">Interface de gerenciamento de serviços.</p>
          </div>
        </div>
    </div>
    <div class="col-md-3">
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{route('home')}}"><ion-icon name="bookmark"></ion-icon>Home</a></li>
            <li class="breadcrumb-item"><a href="{{route('admin.read.all_servicos')}}">Serviços</a></li>
            <li class="breadcrumb-item active" aria-current="page">Atualizar</li>
          </ol>
        </nav>
    </div>
</div>
@endsection

@section('content')
<div class="row justify-content-center">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">{{ __('Atualização de servicos') }}</div>

            <div class="card-body">
                <form method="POST" action="{{ route('admin.update.servico', ['id' => $servico->id]) }}" aria-label="{{ __('Att') }}">
                    @csrf

                    <div class="form-group row">
                        <label for="titulo" class="col-md-4 col-form-label text-md-right">{{ __('Título') }}</label>

                        <div class="col-md-6">
                            <input id="titulo" type="text" class="form-control{{ $errors->has('titulo') ? ' is-invalid' : '' }}" name="titulo" value="{{$servico->titulo}}" required autofocus placeholder="Digite um titulo para o servico">

                            @if ($errors->has('titulo'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('titulo') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="info" class="col-md-4 col-form-label text-md-right">{{ __('Descrição') }}</label>

                        <div class="col-md-6">
                            <textarea id="info" rows="4" maxlength="150" class="form-control{{ $errors->has('info') ? ' is-invalid' : '' }}" name="info" required placeholder="Descrição geral sobre o servico...">{{$servico->descricao}}</textarea>

                            @if ($errors->has('info'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('info') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="pessoa" class="col-md-4 col-form-label text-md-right">{{ __('Pessoas') }}</label>

                        <div class="col-md-6">
                        	<select class="form-control" name="pessoa[]" id="pessoa" multiple required="">
                                    @forelse ($pessoas as $pessoa)
                                    	<option {{in_array($pessoa->id, $ids) ? 'selected' : ''}} value="{{$pessoa->id}}">{{strtoupper($pessoa->nome)}}</option>
                                	@empty
                                		<option>Nenhuma pessoa cadastrada!</option>
                                	@endforelse
                            </select>

                            @if ($errors->has('pessoa'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('pessoa') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="fechamento" class="col-md-4 col-form-label text-md-right">{{ __('Data de término') }}</label>

                        <div class="col-md-6">
                            <input id="fechamento" type="date" min="" class="form-control{{ $errors->has('fechamento') ? ' is-invalid' : '' }}" name="fechamento" value="{{$servico->fechamento}}" required>

                            @if ($errors->has('fechamento'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('fechamento') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>


                    <div class="form-group row mb-0">
                        <div class="col-md-6 offset-md-4">
                            <button type="submit" class="btn btn-primary">
                                {{ __('Atualizar') }}
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

@extends('layouts.app')

@section('content')
<div class="container">   
    <div class="row justify-content-center">
        <div class="text-center">
            <form class="form-signin" method="POST" action="{{ route('login') }}" aria-label="{{ __('Login') }}">
                @csrf
                <h1 class="h3 mb-3 font-weight-normal">Login</h1>
                <label for="inputEmail" class="sr-only">Email address</label>
                <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" placeholder="Insira seu email" required autofocus>

                @if ($errors->has('email'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('email') }}</strong>
                    </span>
                @endif
                <label for="inputPassword" class="sr-only">Password</label>
                <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required placeholder="Insira sua senha">

                @if ($errors->has('password'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('password') }}</strong>
                    </span>
                @endif
                <div class="checkbox mb-3">
                    <label>
                        <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> {{ __('Remember Me') }}
                    </label>
                </div>
                <button type="submit" class="btn btn-primary">
                    {{ __('Login') }}
                </button>

                <a class="btn btn-link" href="{{ route('password.request') }}">
                    {{ __('Forgot Your Password?') }}
                </a>
            </form>
        </div>
    </div>
</div>
@endsection

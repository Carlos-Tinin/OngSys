@extends('layouts.app')

@section('content')

  <form method="POST" action="{{ route('login') }}">
    @csrf
  <div class="imgcontainer">
    <img src="avatarLogin.jpg" alt="Avatar" class="avatar">
  </div>

  <div class="container">
    <label for="uname"><b>Email Administrador</b></label>
    <input id="email"  type="text"  placeholder="digite seu email"  name="email" required>

    <label for="psw"><b>Senha</b></label>
    <input id="password" type="password" placeholder="digite a senha"  name="password"  required>

    <button id="button2" type="submit">Login</button>
    <label>
      <input  type="checkbox" checked="checked" name="remember"> lembre-se de mim !
    </label>
  </div>
   <!-- 
    <div class="container" style="background-color:#f1f1f1">
      <button type="button" class="cancelbtn">Cancel</button>
      <span class="psw">Forgot <a href="#">password?</a></span>
    </div>
  -->
</form>

@endsection

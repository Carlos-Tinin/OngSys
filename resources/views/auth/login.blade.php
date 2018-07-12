@extends('layouts.app')

@section('content')

  <form action="/action_page.php">
  <div class="imgcontainer">
    <img src="img_avatar2.png" alt="Avatar" class="avatar">
  </div>

  <div class="container">
    <label for="uname"><b>Nome Administrador</b></label>
    <input type="text" placeholder="digite seu nome" name="uname" required>

    <label for="psw"><b>Senha</b></label>
    <input type="password" placeholder="digite a senha" name="psw" required>

    <button id="button2" type="submit">Login</button>
    <label>
      <input type="checkbox" checked="checked" name="remember"> lembre-se de mim !
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

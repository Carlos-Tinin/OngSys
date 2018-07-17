<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>OngSys</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">

        <!-- Styles -->
       
    </head>
    <body>        
        @extends('layouts.app')

     <!-- Nome da empresa animacao  -->
@section('content')
 
<form method="POST" action="{{ url('postAdicionarMembro') }}">
   @csrf
  <div class="form-group">
    <center><label for="exampleFormControlInput1"><h4>NOME</h4></label></center>
    <input id="nome" type="text" name="nome"  class="form-control" id="exampleFormControlInput1" placeholder="nome do membro...">
  </div>
  <div class="form-group">
    <center><label for="exampleFormControlInput1"><h4>CARGO</h4></label></center>
    <input name="cargo" type="text" class="form-control" id="exampleFormControlInput1" placeholder="cargo do membro...">
  </div>
  
  <div class="form-group">
    <center><label for="exampleFormControlTextarea1"><h4>INFORMAÇÔES</h4></label></center>
    <textarea  name="informacao" placeholder="informações adicionais sobre o membro..." class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
  </div>
  <center></center><button id="button2" type="submit">Enviar</button>



</form>
 <br>
 <br>
 <br>
 <br>
 <br>
 <br> 
@endsection



    </body>
</html>

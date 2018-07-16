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
<form>
  <div class="form-group">
    <center><label for="exampleFormControlInput1">NOME</label></center>
    <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="nome do membro...">
  </div>
  <div class="form-group">
    <center><label for="exampleFormControlInput1">CARGO</label></center>
    <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="cargo do membro...">
  </div>
  
  <div class="form-group">
    <center><label for="exampleFormControlTextarea1">INFORMAÇÔES</label></center>
    <textarea placeholder="informações adicionais sobre o membro..." class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
  </div>
</form>
 <br>
 <br>
 <br>
 <br>
 <br>
 <br>
 <br>
 <br>
@endsection



    </body>
</html>

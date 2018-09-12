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
  <div class="animacao">
    <h1 class="logo">    

      <span class="cuboid">
        <span class="cuboid-face cuboid-face-front"></span>
        <span class="cuboid-face cuboid-face-back"></span>
        <span class="cuboid-face cuboid-face-top"></span>
        <span class="cuboid-face cuboid-face-bottom"></span>
        <span class="cuboid-face cuboid-face-left"></span>
        <span class="cuboid-face cuboid-face-right"></span>
      </span>
      <span >NGSYS</span>
    </h1>
  </div>
  <div class="animacao" text="green">
   <font color="#ccccff"><h1>ONG SYSTEM</h1></font>
 </div>




 <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
  <ol class="carousel-indicators">
    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
  </ol>
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img class="d-block w-100" src="teste1.jpg" alt="First slide">
    </div>
    <div class="carousel-item">
      <img class="d-block w-100" src="teste1.jpg" alt="Second slide">
    </div>
    <div class="carousel-item">
      <img class="d-block w-100" src="teste1.jpg" alt="Third slide">
    </div>
  </div>
  <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>


<fieldset class="fieldset-border">
 <legend class="legend-border">
  <i>
   <b>
    <font color="blue">QUEM</font> <font color="black">SOMOS</font>
  </legend> 
</b>
</i>
<font size="4">
  <p>
    A empresa junior, formada por alunos do curso de engenharia da computação
    da Univesidade Estadual de Feira de Santana  <a href="http:/www.ecompjr.com.br/">(Ecompjr) </a> 
    agora tem um serviço comunitário que seráa prestado a toda a comunicade localizada próxima as ao Campus    
  </p>

  <p>
    A empresa junior, formada por alunos do curso de engenharia da computação
    da Univesidade Estadual de Feira de Santana  

  </p>
</font>
</fieldset>

@endsection




 <style>
.animacao {     
 display: flex;
 justify-content: center;
 align-items: center;
 height: 29vh;
}
</style>









    </body>
</html>

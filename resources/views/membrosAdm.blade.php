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
<!-- Editable table -->
<div class="card">
    <h3 class="card-header text-center font-weight-bold text-uppercase py-4">Editar Membros</h3>
    <div class="card-body">
        <div id="table" class="table-editable">
            <span class="table-add float-right mb-3 mr-2"><a href="#!" class="text-success"><i class="fa fa-plus fa-2x" aria-hidden="true"></i></a></span>
            <td>     
                     <center><a class="navbar-brand"href="{{ url('/adicionarMembro') }}"><center><span  class="table-remove"><button type="button" class="btn btn-success" btn-rounded btn-sm my-0">Adicionar membro</button></span></center>   </a></center>
                     
                     
                    </td>
                    <br>

            <table class="table table-bordered table-responsive-md table-striped text-center">
                <tr>
                    <th class="text-center">Nome</th>
                    <th class="text-center">Informações</th>
                    <th class="text-center">Cargo</th>
                    <th class="text-center">Alterar</th>
                    <th class="text-center">Excluir</th>
                    
                    
                    
                </tr>
                <tr>
                    <td class="pt-3-half" contenteditable="true">Emille Sampaio</td>
                    <td class="pt-3-half" contenteditable="true">fez vários projetos para a empresa</td>  
                    <td class="pt-3-half" contenteditable="true">Gerente</td>                
                    <td>
                        <span class="table-remove"><button type="button" class="btn btn-primary">Alterar</button></span>
                    </td>                    
                    <td>
                        <span class="table-remove"><button type="button" class="btn btn-danger">Excluir</button></span>
                    </td>
                </tr>

                

                <!-- This is our clonable table line -->
                
                <!-- This is our clonable table line -->
             
                <!-- This is our clonable table line -->
                
            </table>
            
        </div>
    </div>
</div>
<!-- Editable table -->
<br>
                <br>
                <br>
                <br>
                <br>
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

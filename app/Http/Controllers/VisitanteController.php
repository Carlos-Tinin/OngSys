<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class VisitanteController extends Controller
{
    
    public function servicos()
    {    
    	// Carregas todos os serviços e retorna-los nesse metodo
        return view('servicos');
    }

    public function membros()
    {    
    	// Carregas todos os serviços e retorna-los nesse metodo
        return view('membros');
    }


}

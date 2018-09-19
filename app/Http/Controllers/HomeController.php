<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Pessoa;
use App\Model\Servico;
use Illuminate\Support\Facades\Hash;
use App\User;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {   
        // verificar se realmente precisa esta comentada essa parte
        // $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('home');
    }

    public function servicos()
    {
        $date = date('Y-m-d');
        $servicos = Servico::paginate(5);
        return view('admin.read.all_servicos', ['servicos' => $servicos, 'data' => $date]);
    }
     

    public function register()
    {
         //$user = new User();
         //$user->password = Hash::make('teste1');
         //$user->name = 'elvishuges';
         //$user->email = 'elvishuges@hotmail.com';
         //$user->save();
         return "register";        
    }

    

    
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Pessoa;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */

    
      private $pessoa;
   

    public function __construct(Pessoa $pessoa)
    {   
        //$this->xerox = $xerox;
        $this->pessoa = $pessoa;
        $this->middleware('auth');
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

     public function membrosAdm()
    {   
        
        $pessoas = $this->pessoa->paginate(5);
        return view('membrosAdm',compact('pessoas'));
       // return view('membrosAdm');
    }
     public function addMembros()
    {
        return view('addMembros');
    }


    public function PostAddMembros(Request $request)
    {    
        // dd($request->all()); 
         Pessoa::create([
        'nome' => $request->nome,
        'cargo' => $request->cargo,
        'informacao' => $request->informacao,
        //'hash' => $hashFinal,
        //'dataDeBusca' =>$request->dataDeBusca,
       // 'xerox_id' =>$request->xeroxes_id,
       // 'user_id' =>Auth::user()->id,
      //  'nomeUsuario' => Auth::user()->name,
        ]);
       //$pessoa = $this->membro->create($request->all());
        $pessoas = $this->pessoa->paginate(5);
        return view('membrosAdm',compact('pessoas'));
    }
}

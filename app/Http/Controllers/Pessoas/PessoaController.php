<?php

namespace App\Http\Controllers\Pessoas;

use App\Model\Pessoa;
use App\Model\Cargo;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PessoaController extends Controller
{
    public function __construct() 
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pessoas = Pessoa::paginate(5);
        return view('admin.read.all_pessoas', ['pessoas' => $pessoas]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $cargos = Cargo::all();
        return view('admin.create.pessoa', ['cargos' => $cargos]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // create a new person
        $pessoa = new Pessoa();

        // fills the person's informations
        $pessoa->nome = $request->input('nome');
        $pessoa->informacao = $request->input('info');
        $pessoa->ativo = 1;
        $pessoa->save();

        $cargo = $request->input('cargo');
        if (!is_null($cargo)) {
            foreach ($cargo as $c) {
                $pessoa->cargos()->attach($c);                
            }
        }
        
        $msg = 'cadastrada';
        return redirect()->route('admin.read.all_pessoas')->with('msg', $msg);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Pessoa  $pessoa
     * @return \Illuminate\Http\Response
     */
    public function show(Pessoa $pessoa)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Pessoa  $pessoa
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {   
        $pessoa = Pessoa::find($id);
        $cargos = Cargo::all();

        $ids = $this->createArrayIds($pessoa->cargos);        
        return view('admin.update.pessoa', ['cargos' => $cargos, 'pessoa' => $pessoa, 'ids' => $ids]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // get the person
        $pessoa = Pessoa::find($id);
        $pessoa->cargos()->detach();

        // update the person's informations
        $pessoa->nome = $request->input('nome');
        $pessoa->informacao = $request->input('info');
        $pessoa->save();

        $cargo = $request->input('cargo');
        if (!is_null($cargo)) {
            foreach ($cargo as $c) {
                $pessoa->cargos()->attach($c);                
            }
        }
        $msg = 'atualizada';
        return redirect()->route('admin.read.all_pessoas')->with('msg', $msg);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Pessoa::destroy($id);
        $msg = 'removida';
        return redirect()->route('admin.read.all_pessoas')->with('msg', $msg);
    }

    /**
     * Active the specified resource from storage.
     *
     * @param  $id
     * @return \Illuminate\Http\Response
     */
    public function ativar($id)
    {
        $pessoa = Pessoa::find($id);
        $pessoa->ativo = 1;
        $pessoa->save();
        $msg = 'ativada';
        return redirect()->route('admin.read.all_pessoas')->with('msg', $msg);
    }

    /**
     * unactive the specified resource from storage.
     *
     * @param  $id
     * @return \Illuminate\Http\Response
     */
    public function inativar($id)
    {
        $pessoa = Pessoa::find($id);
        $pessoa->ativo = 0;
        $pessoa->save();
        $msg = 'inativada';
        return redirect()->route('admin.read.all_pessoas')->with('msg', $msg);
    }

    public function createArrayIds($object) {
        $ids = [];
        foreach ($object as $obj) {
            $ids[] = $obj->id;
        }
        return $ids;
    }
}

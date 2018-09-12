<?php

namespace App\Http\Controllers\Cargos;

use App\Model\Cargo;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CargoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cargos = Cargo::paginate(5);
        return view('admin.read.all_cargos', ['cargos' => $cargos]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.create.cargo');
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
        $cargo = new Cargo();
        // fills the cargo's informations
        $cargo->nome = $request->input('nome');
        $cargo->descricao = $request->input('info');
        $cargo->save();

        $msg = 'cadastrado';
        return redirect()->route('admin.read.all_cargos')->with('msg', $msg);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Model\Cargo  $cargo
     * @return \Illuminate\Http\Response
     */
    public function show(Cargo $cargo)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $cargo = Cargo::find($id);     
        return view('admin.update.cargo', ['cargo' => $cargo]);
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
        // get the cargo
        $cargo = Cargo::find($id);

        // update the cargo's informations
        $cargo->nome = $request->input('nome');
        $cargo->descricao = $request->input('info');
        $cargo->save();

        $msg = 'atualizado';
        return redirect()->route('admin.read.all_cargos')->with('msg', $msg);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Model\Cargo  $cargo
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Cargo::destroy($id);
        $msg = 'removido';
        return redirect()->route('admin.read.all_cargos')->with('msg', $msg);
    }
}

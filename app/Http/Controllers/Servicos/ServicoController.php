<?php

namespace App\Http\Controllers\Servicos;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Pessoa;
use App\Model\Servico;

class ServicoController extends Controller
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
        $date = date('Y-m-d');
        $servicos = Servico::paginate(5);
        return view('admin.read.all_servicos', ['servicos' => $servicos, 'data' => $date]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
    	$pessoas = Pessoa::all();
        return view('admin.create.servico', ['pessoas' => $pessoas]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
    	$date = date('Y-m-d');

        $service = new Servico();

        $service->titulo = $request->input('titulo');
        $service->descricao = $request->input('info');
        $service->ativo = 1;
        $service->abertura = $date;
        $service->fechamento = $request->input('fechamento');
        $service->save();

        $pessoas = $request->input('pessoa');
        if (!is_null($pessoas)) {
            foreach ($pessoas as $pessoa) {
                $service->pessoas()->attach($pessoa);                
            }
        }

        return redirect()->route('admin.read.all_servicos');
    }

    /**
     * Display the specified resource.
     *
     * @param  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
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
        $service = Servico::find($id);
        $pessoas = Pessoa::all();

        $ids = $this->createArrayIds($service->pessoas);        
        return view('admin.update.servico', ['pessoas' => $pessoas, 'servico' => $service, 'ids' => $ids]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Model\Cargo  $cargo
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // get the service
        $service = Servico::find($id);
        $service->pessoas()->detach();

        // update the person's informations
        $service->titulo = $request->input('titulo');
        $service->descricao = $request->input('info');
        $service->fechamento = $request->input('fechamento');
        $service->save();

        $pessoas = $request->input('pessoa');
        if (!is_null($pessoas)) {
            foreach ($pessoas as $pessoa) {
                $service->pessoas()->attach($pessoa);                
            }
        }
        $msg = 'atualizado';
        return redirect()->route('admin.read.all_servicos')->with('msg', $msg);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Servico::destroy($id);
        $msg = 'removido';
        return redirect()->route('admin.read.all_servicos')->with('msg', $msg);
    }

    public function createArrayIds($object) {
        $ids = [];
        foreach ($object as $obj) {
            $ids[] = $obj->id;
        }
        return $ids;
    }

    public function fechar($id) {
        $service = Servico::find($id);
        $service->ativo = 0;
        $service->save();

        return redirect()->route('admin.read.all_servicos');
    }
}

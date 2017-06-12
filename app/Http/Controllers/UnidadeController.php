<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Unidade;
use App\Polo;

class UnidadeController extends Controller
{

    public function __construct()
    {
        //$this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $unidades = Unidade::all();
        return view('unidade.list',compact('unidades'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $title = 'Cadastrar unidade';
        $polos = Polo::all();
        return view('unidade.form',compact('title','polos'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if(Unidade::create($request->all()))
            return redirect()->route('unidades.list')->with('message','Unidade cadastrada com sucesso!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($idPolo = null)
    {
        return Unidade::where('polo_id',$idPolo)->get();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $title = 'Editar unidade';
        $polos = Polo::all();
        $unidade = Unidade::find($id);
        return view('unidade.form',compact('title','unidade','polos'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        if(Unidade::find($id)->fill($request->all())->update())
            return redirect()->route('unidades.list')->with('message','Unidade alterada com sucesso!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if(Unidade::destroy($id))
            return redirect()->route('unidades.list')->with('message_delete','Unidade excluída com sucesso!');
    }
}

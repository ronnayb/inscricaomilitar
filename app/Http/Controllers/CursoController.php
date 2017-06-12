<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Curso;
use App\Unidade;
use App\Polo;
use App\Seletivo;

class CursoController extends Controller
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

        $cursos = Curso::all();
        return view('curso.list',compact('cursos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $title = 'Cadastrar curso';

        $turnos = ['MATUTINO','VESPERTINO','NOTURNO','INTEGRAL'];
        $niveis = \DB::table('niveis')->get();
        $seletivos = Seletivo::where('ativo','=',true)->get();
        $polos = Polo::all();
        $unidades = Unidade::all();

        return view('curso.form',compact('title','turnos','niveis','polos','unidades','seletivos'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if(Curso::Create($request->all()))
            return redirect()->route('cursos.list')->with('message','Curso cadastrado com sucesso!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id = null, $idSeletivo = null)
    {
        $cursos = \DB::table('cursos')
            ->join('curso_seletivo','cursos.id','=','curso_seletivo.curso_id')
            ->join('unidades','cursos.unidade_id','=','unidades.id')
            ->where([['curso_seletivo.seletivo_id',$idSeletivo],['unidades.id',$id]])
            ->select(['cursos.id','cursos.curso'])
            ->get();
        return $cursos;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $title = 'Alterar curso';
        $turnos = ['MATUTINO','VESPERTINO','NOTURNO','INTEGRAL'];
        $niveis = \DB::table('niveis')->get();
        $seletivos = Seletivo::where('ativo','=',true)->get();
        $polos = Polo::all();
        $unidades = Unidade::all();
        $curso = Curso::find($id);

        return view('curso.form',compact('title','turnos','niveis','polos','unidades','curso','seletivos'));
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
         if(Curso::find($id)->fill($request->all())->update())
            return redirect()->route('cursos.list')->with('message','Curso alterado com sucesso!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if(Curso::destroy($id))
            return redirect()->route('cursos.list')->with('message_delete','Curso excluído com sucesso!');
    }
}

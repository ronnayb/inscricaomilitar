<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Seletivo;
use App\Service\SeletivoService;
use App\Polo;


class SeletivoController extends Controller
{

    protected $seletivoService;

    public function __construct(SeletivoService $seletivoService)
    {
        $this->middleware('auth');
        $this->seletivoService = $seletivoService;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $seletivos = $this->seletivoService->all();
        return view('seletivo.list',compact('seletivos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $title = 'Cadastrar processo seletivo';
        return view('seletivo.form',compact('title'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {   
        $seletivo = $this->seletivoService->save($request->all());
        if($seletivo){
            return redirect()->route('seletivos.show',$seletivo->id)
                             ->with('message','Processo Seletivo cadastrado com sucesso!');
        }else{
            return 'erro';
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $seletivo = $this->seletivoService->findById($id);
        return view('seletivo.show',compact('seletivo'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $seletivo = $this->seletivoService->findById($id);
        if($seletivo){
            $title = 'Cadastrar processo seletivo';
            return view('seletivo.form',compact('title','seletivo'));
        }
            return redirect()->route('seletivos.list');
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
        if($this->seletivoService->update($id,$request->all())){
            return redirect()->route('seletivos.list')
                             ->with('message','Processo Seletivo alterado com sucesso!');;
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function ativos(){
        $seletivos =  $this->seletivoService->ativos();
        return view('inscricao.seletivos',compact('seletivos'));
    }

    public function showCourse($id)
    {
        $seletivo = $this->seletivoService->findById($id);
        $cursosSeletivo = $seletivo->cursos()->get();
         
        $polos = Polo::all();
        $polos->each(function($polo, $key) use ($cursosSeletivo){
            $polo->unidades->each(function($unidade, $key) use ($cursosSeletivo){
                $unidade->cursos = $unidade->cursos->map(function($curso, $key) use ($cursosSeletivo){
                    $cursosSeletivo->each(function($item, $key) use ($curso){
                        if($item->id == $curso->id)
                            $curso->checked = "checked";
                    });
                    return $curso;
                });
            });
        });
        return view('seletivo.addCurso',compact('seletivo','polos'));
    }

    public function addCursos(Request $request){
        $seletivo = $this->seletivoService->findById($request->input('seletivo_id'));
        $cursosSeletivo = $seletivo->cursos()->get();

        if($seletivo->cursos()->detach($cursosSeletivo->pluck('id')->toArray()) || 
           count($cursosSeletivo->toArray()) == 0){

            if(!$seletivo->cursos()->attach($request->input('curso_id'))){
                return redirect()
                        ->route('seletivos.show',$seletivo->id)
                        ->with('message','Curso(s) modificados!');
            }
        }
    }
}

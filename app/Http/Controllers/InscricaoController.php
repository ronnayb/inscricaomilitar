<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Service\SeletivoService;
use App\Service\InscricaoService;
use App\Inscricao;
use App\Polo;
use App\Unidade;
use App\Curso;
use App\Seletivo;
use App\Cadastro;

class InscricaoController extends Controller
{
    protected $seletivoService;
    protected $inscricaoService;

    public function __construct(SeletivoService $seletivoService, InscricaoService $inscricaoService)
    {
        $this->middleware('auth')->except(['create','store']);
        $this->seletivoService  = $seletivoService;
        $this->inscricaoService = $inscricaoService;
    }

    public function index($id, Request $request){
        $polos = \App\Polo::all();
        $seletivo = \App\Seletivo::find($id);
        return view('inscritos.list',compact('polos','seletivo'));
    }

    

    public function create(){
        $polos = Polo::all();
        $unidades = Unidade::all();
        $cursos = Curso::all();
        $seletivos = Seletivo::ativo()->get();
        $estuda_em = collect([['value' => 'PUBLICA','label' => 'Escola Pública'],
                              ['value' => 'PARTICULAR','label' => 'Escola Particular']]);
        return view('inscricao.form',compact('inscricao',
                                             'polos',
                                             'unidades',
                                             'cursos',
                                             'cadastro',
                                             'seletivos',
                                             'estuda_em'));
    }

    public function store(Request $request){
        try{
            $inscricao = $this->inscricaoService->save($request->all());
            if($inscricao)            
                return view('inscricao.confirmacao',compact('inscricao'));
        }catch(\Illuminate\Database\QueryException $e){
            if($e->getCode() == 23000)
                return redirect()->route('inscricao.new')
                                 ->with('message-erro','Já existe uma incrição para este CPF.');
        }
    }

    public function edit($id)
    {
        $inscricao = $this->inscricaoService->byId($id);
        $polos = Polo::all();
        $unidades = Unidade::where('polo_id',$inscricao->curso->unidade->polo->id)->get();
        $cursos = Curso::where('unidade_id',$inscricao->curso->unidade->id)->get();
        $estuda_em = collect([['value' => 'PUBLICA','label' => 'Escola Pública'],
                              ['value' => 'PARTICULAR','label' => 'Escola Particular']]);
        $seletivos = Seletivo::ativo()->get();
        return view('inscricao.form',compact('inscricao','polos',
                                             'unidades','cursos',
                                             'cadastro','seletivos','estuda_em'));
    }

    public function update(Request $request, $id)
    {
            if($this->inscricaoService->update($id, $request->all())){
                return redirect()->route('inscricao.show',$id)
                ->with('message','Inscricao alterado com sucesso!');
            }
    }

    public function show($id)
    {
        $inscricao = $this->inscricaoService->byId($id);
        return view('inscricao.confirmacao',compact('inscricao'));
    }

    public function seletivos(){
        $seletivos = $this->seletivoService->ativos();
        return view('inscricao.seletivos',compact('seletivos'));
    }

    public function find(Request $request)
    {
        $inscricaos = \DB::table('inscricaos')
                                ->join('cursos','inscricaos.curso_id','=','cursos.id')
                                ->join('unidades','cursos.unidade_id','=','unidades.id')
                                ->join('polos','unidades.polo_id','=','polos.id')
                                ->where($request->all()['where'])
                                ->select('inscricaos.*')
                                ->get();
        $inscricaos = $inscricaos->each(function($item, $key){
                $item->uri_alterar = route('inscricao.edit',$item->id);
                $item->uri_visualizar = route('inscricao.show',$item->id);
        });
        return $inscricaos;
    }

    public function relatorio($idSeletivo, $idCurso){
        $seletivo = Seletivo::find($idSeletivo);
        $curso = Curso::find($idCurso);
        $inscritos = Inscricao::where([['seletivo_id','=',$idSeletivo],['curso_id','=',$idCurso]])->get();
        return view('relatorios.inscritos-seletivo-curso' ,
                    compact('seletivo','curso','inscritos'));
    }

}
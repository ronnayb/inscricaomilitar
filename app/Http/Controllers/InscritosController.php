<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Polo;
use App\Seletivo;
use App\Inscricao;

class InscritosController extends Controller
{

    public function __construct()
    {
        //$this->middleware('auth');
    }
    
    public function index(){
    	
    	$seletivos = Seletivo::all();
    	$polos = Polo::all();
    	return view('inscritos.list',compact('seletivos','polos'));
    }

    public function porCurso($seletivoId, $cursoId){
    	$inscritos = Inscricao::with('cadastro')->where([['seletivo_id','=',$seletivoId],
    	    						   ['curso_id','=',$cursoId]])->get();

        $inscritos = $inscritos->each(function($item){
            $item->uri_alterar = route('inscricao.confirmacao',1);
        });

        return $inscritos;

    	
    }
}

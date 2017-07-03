<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Service\RelatoriosService;

class RelatoriosController extends Controller
{

    protected $relatoriosService;

    public function __construct(RelatoriosService $relatoriosService)
    {
        $this->middleware('auth');
        $this->relatoriosService = $relatoriosService;
    }

    public function inscritosSeletivos($id){
        $seletivo = $this->relatoriosService->inscritosPorSeletivo($id);
        return view('relatorios.relatorio_geral_inscritos',compact('seletivo'));
        return $seletivo;
    }
}

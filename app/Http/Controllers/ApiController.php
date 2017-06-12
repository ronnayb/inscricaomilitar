<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Unidade;
use App\Curso;

class ApiController extends Controller
{
    public function unidades($idPolo = null){
        return Unidade::where('polo_id',$idPolo)->get();
    }

    public function cursos($id = null, $idSeletivo = null)
    {
        $cursos = \DB::table('cursos')
            ->join('curso_seletivo','cursos.id','=','curso_seletivo.curso_id')
            ->join('unidades','cursos.unidade_id','=','unidades.id')
            ->where([['curso_seletivo.seletivo_id',$idSeletivo],['unidades.id',$id]])
            ->select(['cursos.id','cursos.curso','cursos.turno'])
            ->get();
        return $cursos;
    }
}

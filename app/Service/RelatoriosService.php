<?php

namespace App\Service;
use App\Inscricao;
use App\Seletivo;

class RelatoriosService {

    public function inscritosPorSeletivo($id){
        $seletivo = Seletivo::find($id);
        $retorno['seletivo'] = $seletivo;
        $retorno['seletivo']['total_inscritos'] = $seletivo->inscricoes()->count();

        $inscritos = \DB::table('inscricaos')
                            ->select(['inscricaos.*','cursos.curso','cursos.turno','unidades.unidade','polos.polo',
                                     'seletivos.ano','seletivos.edicao'])
                            ->join('seletivos','seletivos.id','=','inscricaos.seletivo_id')
                            ->join('cursos','inscricaos.curso_id','=','cursos.id')
                            ->join('unidades','unidades.id','=','cursos.unidade_id')
                            ->join('polos','polos.id','=','unidades.polo_id')
                            ->where('seletivo_id',$id)
                            ->orderBy('unidades.unidade')
                            ->orderBy('cursos.curso')
                            ->orderBy('cursos.turno')
                            ->get();

        // $qtd_insc_unidade = \DB::select('select uni.id,
        //                         uni.unidade,  
        //                         count(ins.curso_id) as total
        //                     from 
        //                         inscricaos ins, 
        //                         cursos cur, 
        //                         seletivos sel, 
        //                         unidades uni
        //                     where 
        //                         ins.curso_id = cur.id 
        //                         and  ins.seletivo_id = sel.id
        //                         and uni.id = cur.unidade_id
        //                     group by 
        //                         uni.id,uni.unidade');
        // $retorno['seletivo']['qtd_insc_unidade'] = $qtd_insc_unidade;
        $retorno['seletivo']['inscritos'] = $inscritos;
        return $retorno;
    }

}
<?php

namespace App\Service;
use App\Cadastro;
use App\Inscricao;

class InscricaoService {

    public function buscaInscrito($seletivoId,$cpf){
        $inscricao = Inscricao::where([['seletivo_id','=',$seletivoId],
                                       ['cpf','=',$cpf]
                                     ])->first();
        return $inscricao;
    }

    public function save(array $form){
		$form['data_nascimento'] = \Carbon\Carbon::createFromFormat('d/m/Y',$form['data_nascimento']);
        return Inscricao::Create($form);
	}

    public function update($id, array $form){
        $form['data_nascimento'] = \Carbon\Carbon::createFromFormat('d/m/Y',$form['data_nascimento']);
        return Inscricao::find($id)->fill($form)->update();
    }

    public function inscritos(){
        $inscritos = Inscritos::all();
        return $inscritos;
    }

     public function byId($id){
        return Inscricao::find($id);
    }


    
}
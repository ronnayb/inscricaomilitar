<?php

namespace App\Service;
use App\Cadastro;
use App\Inscricao;

class CadastroService {

	public function save(array $form){
		$form['data_nascimento'] = \Carbon\Carbon::createFromFormat('d/m/Y',$form['data_nascimento']);
		$cadastro = $this->findByCPF($form['cpf']);
		
		if($cadastro){
			if(Cadastro::find($cadastro->id)->fill($form)->update()){
				$form['cadastro_id'] = $cadastro->id;
				return Inscricao::Create($form);
			}
			return false;
		}
		$cadastro = Cadastro::create($form);
		if($cadastro){
			$form['cadastro_id'] = $cadastro->id;
			return Inscricao::create($form);
		}
		return false;
	}

	public function findByCPF($cpf){
		$cadastro = Cadastro::where('cpf','=',$cpf)->first();
		if($cadastro){
			$cadastro['data_nascimento'] = \Carbon\Carbon::createFromFormat('Y-m-d', $cadastro['data_nascimento'])->format('d/m/Y');
		}
		return $cadastro;
	}

}
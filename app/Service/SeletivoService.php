<?php

namespace App\Service;

use App\Seletivo;

class SeletivoService {

    public function save(array $seletivo){
		$seletivo['inicio_inscricao'] = \Carbon\Carbon::createFromFormat('d/m/Y',$seletivo['inicio_inscricao']);
		$seletivo['fim_inscricao'] = \Carbon\Carbon::createFromFormat('d/m/Y',$seletivo['fim_inscricao']);
		$seletivo['ano'] = date("Y");
		$edicao = \DB::table('seletivos')->where('ano','=',$seletivo['ano'])->max('edicao');
		$seletivo['edicao'] = $edicao == null ? 1 : $edicao+1;
		$seletivo['ativo'] = true;

		if(	(\DB::table('seletivos')->update(['ativo' => 0])) ||
			(\DB::table('seletivos')->select()->get()->count() >= 0))
			return Seletivo::create($seletivo);
	}

	public function update($id, array $seletivo){
		$seletivo['inicio_inscricao'] = \Carbon\Carbon::createFromFormat('d/m/Y',$seletivo['inicio_inscricao']);
		$seletivo['fim_inscricao'] = \Carbon\Carbon::createFromFormat('d/m/Y',$seletivo['fim_inscricao']);

		return Seletivo::find($id)->fill($seletivo)->update();
	}

    public function findById($id){
		$seletivo = Seletivo::find($id);
		if($seletivo){
			$seletivo['data_inicio'] = \Carbon\Carbon::createFromFormat('Y-m-d', $seletivo->inicio_inscricao)->format('d/m/Y');
			$seletivo['data_fim'] = \Carbon\Carbon::createFromFormat('Y-m-d', $seletivo->fim_inscricao)->format('d/m/Y');

			$seletivo['inicio_inscricao'] = \Carbon\Carbon::createFromFormat('Y-m-d', $seletivo['inicio_inscricao'])->format('d/m/Y');
			$seletivo['fim_inscricao']    = \Carbon\Carbon::createFromFormat('Y-m-d', $seletivo['fim_inscricao'])->format('d/m/Y');
		}
		return $seletivo;
	}

	public function all(){
		return Seletivo::all();
	}

	public function ativos(){
		$seletivos = Seletivo::ativo()->get();
		if($seletivos){
			$seletivos->map(function($item, $index){
				$item['data_inicio'] = \Carbon\Carbon::createFromFormat('Y-m-d', $item->inicio_inscricao)->format('d/m/Y');
				$item['data_fim'] = \Carbon\Carbon::createFromFormat('Y-m-d', $item->fim_inscricao)->format('d/m/Y');
				$item['inicio_inscricao'] = \Carbon\Carbon::createFromFormat('Y-m-d', $item['inicio_inscricao'])->format('d/m/Y');
				$item['fim_inscricao']    = \Carbon\Carbon::createFromFormat('Y-m-d', $item['fim_inscricao'])->format('d/m/Y');
			});
		}
		return $seletivos;
	}

}
<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Inscricao extends Model
{
    protected $fillable = [
    	'cpf',
        'data_nascimento',
        'nome',
        'rg',
        'emissor_rg',
        'responsavel',
        'celular',
        'outro_telefone',
        'email',
        'seletivo_id',
        'curso_id',
        'estuda_em'
    ];

    public function curso(){
    	return $this->belongsTo(Curso::class);
    }

    public function seletivo(){
    	return $this->belongsTo(Seletivo::class);
    }
}

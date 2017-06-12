<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cadastro extends Model
{
    protected $fillable = [
    	'cpf'
    	,'data_nascimento'
    	,'nome'
    	,'rg'
    	,'emissor_rg'
    	,'responsavel'
    	,'celular'
    	,'outro_telefone'
    	,'email'
    ];
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Seletivo extends Model
{
    protected $fillable = [
    	'inicio_inscricao',
    	'hora_inicio_inscricao',
    	'fim_inscricao',
    	'hora_fim_inscricao',
    	'ano',
    	'ativo',
    	'edicao'];

    	public function getSeletivoAttribute($value){
    		return 'Processo Seletivo Colégio Militar ' . $this->ano . '/' . $this->edicao;
    	}

        public function scopeAtivo($query){
            return $query->where('ativo',1);
        }

        public function cursos(){
            return $this->belongsToMany(Curso::class);
        }

        public function inscricoes(){
            return $this->hasMany(Inscricao::class);
        }
}

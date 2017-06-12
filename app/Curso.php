<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Curso extends Model
{
    protected $fillable = ['curso','unidade_id','nivel_id','turno'];

    public function nivel(){
    	return $this->belongsTo(Nivel::class);
    }

    public function unidade(){
    	return $this->belongsTo(Unidade::class);
    }

    public function seletivos(){
        return $this->belongsToMany(Seletivo::class);
    }

    public function inscricoes(){
        return $this->hasMany(Inscricao::class);
    }

    public function inscricoess($seletivoId){
        return Inscricao::where([['seletivo_id','=',$seletivoId],['curso_id','=',$this->id]])->count();
    }
}

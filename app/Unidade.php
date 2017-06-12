<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Unidade extends Model
{
    protected $fillable = ['unidade','polo_id'];

    public function polo(){
    	return $this->belongsTo(Polo::class);
    }

    public function cursos(){
    	return $this->hasMany(Curso::class);
    }
}

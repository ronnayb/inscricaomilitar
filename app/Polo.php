<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Polo extends Model
{
    protected $fillable = ['polo'];

    public function unidades(){
    	return $this->hasMany(Unidade::class);
    }
}

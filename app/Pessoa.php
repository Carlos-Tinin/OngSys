<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pessoa extends Model
{
    protected $table = "pessoas";

     protected $fillable = [
        'nome', 'cargo','informacao',
    ];


    public function servicos() {
    	return $this->belongsToMany(Servico::class, "pessoa_servicos");
    }
}

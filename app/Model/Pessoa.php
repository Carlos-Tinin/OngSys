<?php

namespace App\Pessoa;

use Illuminate\Database\Eloquent\Model;

class Pessoa extends Model
{
    protected $table = "pessoas";

    public function servicos() {
    	return $this->belongsToMany(Servico::class, "pessoa_servicos");
    }
}

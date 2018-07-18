<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Pessoa extends Model
{
    protected $table = "pessoas";

    public function servicos() {
    	return $this->belongsToMany(Servico::class, "pessoa_servicos");
    }

    public function cargos() {
    	return $this->belongsToMany(Cargo::class, "pessoa_cargos");
    }
}

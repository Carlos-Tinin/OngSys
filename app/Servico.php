<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Servico extends Model
{
    protected $table = "servicos";

    public function pessoas() {
    	return $this->belongsToMany(Pessoa::class, "pessoa_servicos");
    }
}

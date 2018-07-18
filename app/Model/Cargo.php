<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Cargo extends Model
{
    protected $table = "cargos";

    public function pessoas() {
    	return $this->belongsToMany(Pessoa::class, "pessoa_cargos");
    }
}

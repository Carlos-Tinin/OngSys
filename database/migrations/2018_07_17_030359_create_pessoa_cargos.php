<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePessoaCargos extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pessoa_cargos', function(Blueprint $table) {
            $table->unsignedInteger('pessoa_id');
            $table->unsignedInteger('cargo_id');

            $table->foreign('pessoa_id')
                    ->references('id')->on('pessoas')
                    ->onDelete('cascade');

            $table->foreign('cargo_id')
                    ->references('id')->on('cargos')
                    ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropifExists('pessoa_cargos');
    }
}

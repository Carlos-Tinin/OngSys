<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class PessoaServicos extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pessoa_servicos', function(Blueprint $table) {
            $table->unsignedInteger('pessoa_id');
            $table->unsignedInteger('servico_id');

            $table->foreign('pessoa_id')
                    ->references('id')->on('pessoas')
                    ->onDelete('cascade');

            $table->foreign('servico_id')
                    ->references('id')->on('servicos')
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
        Schema::dropIfExists('pessoa_servicos');
    }
}

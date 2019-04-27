<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEnderecosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('enderecos', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('cliente_id')->unsigned()->index('fk_cliente_id_endereco');
            $table->char('uf',2)->nullable();
            $table->string('cidade',255)->nullable();
            $table->string('cep')->nullable();
            $table->string('endereco',255)->nullable();
            $table->string('bairro',255)->nullable();
            $table->timestamps();
        });

        Schema::table('enderecos', function($table) {
            $table->foreign('cliente_id','fk_cliente_id_endereco')->references('id')->on('clientes');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('enderecos');
    }
}

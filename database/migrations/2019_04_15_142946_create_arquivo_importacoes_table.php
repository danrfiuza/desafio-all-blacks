<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateArquivoImportacoesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('arquivo_importacoes', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nome', 255);
            $table->string('nome_original',255);
            $table->integer('quantidade_processada')->insigned()->default(0);
            $table->boolean('processado')->default(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('arquivo_importacoes');
    }
}

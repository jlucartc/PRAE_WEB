<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCategoriasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('categorias', function (Blueprint $table) {
            $table->increments('id');
            $table->text('nome');
            $table->integer('tipo_categoria')->comment("1 - Bolsas, 2 - Auxilios, 3 - Programas, 4 - Institucionais");
            $table->text('responsavel')->nullable();
            $table->text('email')->nullable();
            $table->string('fone')->nullable();
            $table->text('rua')->nullable();
            $table->text('numero')->nullable();
            $table->text('bairro')->nullable();
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
        Schema::dropIfExists('categorias');
    }
}

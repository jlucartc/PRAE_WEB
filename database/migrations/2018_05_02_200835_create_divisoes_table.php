<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDivisoesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('divisoes', function (Blueprint $table) {
            $table->increments('id');
            $table->text('nome');
            $table->biginteger('coordenadoria_id');
            $table->string('fone')->nullable();
            $table->string('fax')->nullable();
            $table->text('email');
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
        Schema::dropIfExists('divisoes');
    }
}

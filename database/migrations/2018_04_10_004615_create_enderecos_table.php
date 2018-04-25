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
            $table->string('rua', 100);
            $table->integer('numero');
            $table->string('complemento', 100)->nullable();
            $table->string('cidade', 100)->default('Pelotas');
            $table->string('bairro', 50);
            $table->bigInteger('cep');
            $table->string('estado', 50)->default('Rio Grande do Sul');
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
        Schema::disableForeignKeyConstraints();
        Schema::dropIfExists('enderecos');
        Schema::enableForeignKeyConstraints();
    }
}

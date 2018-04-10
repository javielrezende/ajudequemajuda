<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCampanhasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('campanhas', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nome', 45);
            $table->text('descricao');
            $table->text('urgencia');
            $table->unsignedInteger('entidades_id');
            $table->foreign('entidades_id')
                ->references('id')->on('entidades')
                ->onDelete('cascade');
            $table->unsignedInteger('usuarios_id');
            $table->foreign('usuarios_id')
                ->references('id')->on('usuarios')
                ->onDelete('cascade');
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
        Schema::dropIfExists('campanhas');
    }
}

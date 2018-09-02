<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEventosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('eventos', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nome');
            $table->text('descricao');
            $table->dateTime('dataHoraInicio')->nullable();
            $table->dateTime('dataHoraFim')->nullable();
            $table->boolean('status')->default(0);
            $table->unsignedInteger('campanhas_id');
            $table->foreign('campanhas_id')
                ->references('id')->on('campanhas')
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table->unsignedInteger('enderecos_id');
            $table->foreign('enderecos_id')
                ->references('id')->on('enderecos')
                ->onUpdate('cascade')
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
        Schema::disableForeignKeyConstraints();
        Schema::dropIfExists('eventos');
        Schema::enableForeignKeyConstraints();
    }
}

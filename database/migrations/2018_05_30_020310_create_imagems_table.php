<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateImagemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('imagems', function (Blueprint $table) {
            $table->increments('id');
            $table->string('titulo', 191)->nullable();
            $table->string('caminho', 191);
            $table->boolean('capa')->nullable();
            $table->unsignedInteger('campanhas_id');
            $table->foreign('campanhas_id')
                ->references('id')->on('campanhas')
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table->unsignedInteger('eventos_id');
            $table->foreign('eventos_id')
                ->references('id')->on('eventos')
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
        Schema::dropIfExists('imagems');
    }
}

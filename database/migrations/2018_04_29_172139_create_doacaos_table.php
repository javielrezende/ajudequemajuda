<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDoacaosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('doacaos', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('quantidade');
            $table->binary('confirmacao')->nullable()->default(0);
            $table->unsignedInteger('users_id');
            $table->foreign('users_id')
                ->references('id')->on('user')
                ->onDelete('cascade');
            $table->unsignedInteger('campanhas_id');
            $table->foreign('campanhas_id')
                ->references('id')->on('campanha')
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
        Schema::dropIfExists('doacaos');
        Schema::enableForeignKeyConstraints();
    }
}

<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateItemDoacaosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('item_doacaos', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('itens_id');
            $table->foreign('itens_id')
                ->references('id')->on('items')
                ->onDelete('cascade');
            $table->unsignedInteger('doacoes_id');
            $table->foreign('doacoes_id')
                ->references('id')->on('doacaos')
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
        Schema::dropIfExists('item_doacaos');
        Schema::enableForeignKeyConstraints();
    }
}

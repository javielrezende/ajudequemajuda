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
            $table->unsignedInteger('itens_id');
            $table->unsignedInteger('doacoes_id');
            $table->primary(['itens_id', 'doacoes_id']);
            $table->foreign('itens_id')
                ->references('id')->on('items')
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table->foreign('doacoes_id')
                ->references('id')->on('doacaos')
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
        Schema::dropIfExists('item_doacaos');
        Schema::enableForeignKeyConstraints();
    }
}

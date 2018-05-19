<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCampanhaItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('campanha_items', function (Blueprint $table) {
            $table->unsignedInteger('campanhas_id');
            $table->unsignedInteger('itens_id');
            $table->primary(['campanhas_id', 'itens_id']);
            $table->foreign('campanhas_id')
                ->references('id')->on('campanhas')
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table->foreign('itens_id')
                ->references('id')->on('items')
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table->boolean('urgencia')->default(0);
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
        Schema::dropIfExists('campanha_items');
        Schema::enableForeignKeyConstraints();
    }
}

<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserCampanhaCurtidaInteressesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_campanha_curtida_interesses', function (Blueprint $table) {
            $table->unsignedInteger('users_id');
            $table->unsignedInteger('campanhas_id');
            $table->primary(['users_id', 'campanhas_id']);
            $table->boolean('curtidas')->nullable()->default(0);
            $table->boolean('interesse')->nullable()->default(0);
            $table->foreign('users_id')
                ->references('id')->on('users')
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table->foreign('campanhas_id')
                ->references('id')->on('campanhas')
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
        Schema::dropIfExists('user_campanha_curtida_interesses');
        Schema::enableForeignKeyConstraints();
    }
}

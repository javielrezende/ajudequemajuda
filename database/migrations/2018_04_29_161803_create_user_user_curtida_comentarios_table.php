<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserUserCurtidaComentariosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_user_curtida_comentarios', function (Blueprint $table) {
            $table->unsignedInteger('users_id');
            $table->unsignedInteger('users_id1');
            $table->primary(['users_id', 'users_id1']);
            $table->boolean('curtidas')->nullable()->default(0);
            $table->text('comentarios')->nullable();
            $table->boolean('denuncia')->nullable()->default(0);
            $table->text('emnsagem_denuncia')->nullable();
            $table->foreign('users_id')
                ->references('id')->on('users')
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table->foreign('users_id1')
                ->references('id')->on('users')
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
        Schema::dropIfExists('user_user_curtida_comentarios');
        Schema::enableForeignKeyConstraints();
    }

}

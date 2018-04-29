<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersUsersCurtidasComentariosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users_users_curtidas_comentarios', function (Blueprint $table) {
            $table->increments('id');
            $table->binary('curtidas')->nullable()->default(0);
            $table->text('comentarios')->nullable();
            $table->unsignedInteger('users_id');
            $table->foreign('users_id')
                ->references('id')->on('users')
                ->onDelete('cascade');
            $table->unsignedInteger('users_id1');
            $table->foreign('users_id1')
                ->references('id')->on('users')
                ->onDelete('cascade');


            $table->string('name');
            $table->string('email')->unique();
            $table->string('password');
            $table->bigInteger('cpf')->unique()->nullable();
            $table->bigInteger('cnpj')->unique()->nullable();
            $table->bigInteger('fone')->nullable();
            $table->binary('entidade')->default(0);
            $table->text('mensagem');
            $table->binary('solicitacao_entidade')->default(0);
            $table->binary('status')->default(0);
            $table->unsignedInteger('enderecos_id');
            $table->foreign('enderecos_id')
                ->references('id')->on('enderecos')
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
        Schema::dropIfExists('users_users_curtidas_comentarios');
        Schema::enableForeignKeyConstraints();
    }
}

<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('email')->unique();
            $table->string('password');
            $table->bigInteger('cpf')->unique()->nullable();
            $table->bigInteger('cnpj')->unique()->nullable();
            $table->bigInteger('fone')->nullable();
            $table->boolean('entidade')->nullable()->default(0);
            $table->text('mensagem')->nullable();
            $table->text('descricao_entidade')->nullable();
            $table->boolean('solicitacao_entidade')->nullable()->default(0);
            $table->boolean('status')->nullable()->default(0);
            $table->unsignedInteger('enderecos_id');
            $table->foreign('enderecos_id')
                ->references('id')->on('enderecos')
                ->onDelete('cascade');
            $table->rememberToken();
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
        Schema::dropIfExists('users');
        Schema::enableForeignKeyConstraints();
    }
}

<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'Roger Rezende',
            'email' => 'javielrezende@gmail.com',
            'password' => bcrypt(123123),
            'imagem' => null,
            'cpf' => 1853824011,
            'cnpj' => null,
            'fone' => 53991274463,
            'entidade' => 0,
            'mensagem' => null,
            'descricao_entidade' => null,
            'solicitacao_entidade' => 0,
            'status' => 1,
            'enderecos_id' => 1,
            'created_at' => date('Y-m-d h:i:s'),
            'updated_at' => date('Y-m-d h:i:s')
        ]);
        DB::table('users')->insert([
            'name' => 'Tecon',
            'email' => 'tecon@gmail.com',
            'password' => bcrypt(123123),
            'cpf' => null,
            'cnpj' => 1111111111111,
            'fone' => 53991000000,
            'entidade' => 1,
            'mensagem' => 'Quero ser a entidade tecon',
            'descricao_entidade' => 'Empresa ética e responsável',
            'solicitacao_entidade' => 1,
            'status' => 1,
            'enderecos_id' => 2,
            'created_at' => date('Y-m-d h:i:s'),
            'updated_at' => date('Y-m-d h:i:s')
        ]);
    }
}

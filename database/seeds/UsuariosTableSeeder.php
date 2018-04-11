<?php

use Illuminate\Database\Seeder;

class UsuariosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('usuarios')->insert([
            'nome' => 'Paulo Rezende',
            'email' => 'paulor@gmail.com',
            'senha' => '123',
            'cpf' => 00000000000,
            'fone' => 5332481400,
            'enderecos_id' => 1,
            'created_at' => date('Y-m-d h:i:s'),
            'updated_at' => date('Y-m-d h:i:s')
        ]);

        DB::table('usuarios')->insert([
            'nome' => 'Roger Rezende',
            'email' => 'roger@gmail.com',
            'senha' => '234',
            'cpf' => 11111111111,
            'fone' => 5391823774,
            'endereco_id' => 2,
            'created_at' => date('Y-m-d h:i:s'),
            'updated_at' => date('Y-m-d h:i:s')
        ]);

        DB::table('usuarios')->insert([
            'nome' => 'Ricardo Hernande',
            'email' => 'jose@gmail.com',
            'senha' => '345',
            'cpf' => 22222222222,
            'fone' => 5332273344,
            'endereco_id' => 3,
            'created_at' => date('Y-m-d h:i:s'),
            'updated_at' => date('Y-m-d h:i:s')
        ]);
    }
}

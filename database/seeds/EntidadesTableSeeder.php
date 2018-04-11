<?php

use Illuminate\Database\Seeder;

class EntidadesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('entidades')->insert([
            'nome' => 'Casa de alimentos',
            'email' => 'casaalimento@gmail.com',
            'senha' => '456',
            'cpf' =>null,
            'cnpj' => 00000000000000,
            'fone' => 5332221111,
            'enderecos_id' => 4,
            'created_at' => date('Y-m-d h:i:s'),
            'updated_at' => date('Y-m-d h:i:s')
        ]);
    }
}

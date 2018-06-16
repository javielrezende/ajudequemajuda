<?php

use Illuminate\Database\Seeder;

class EnderecosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('enderecos')->insert([
            'rua' => 'Olavo Bilac',
            'numero' => 718,
            'complemento' => 'Casa 7',
            'cidade' => 'Pelotas',
            'bairro' => 'Fragata',
            'cep' => 96030400,
            'estado' => 'Rio Grande do Sul',
            'created_at' => date('Y-m-d h:i:s'),
            'updated_at' => date('Y-m-d h:i:s')
        ]);
        DB::table('enderecos')->insert([
            'rua' => 'Estrada tecon',
            'numero' => 54,
            'complemento' => 'Porto',
            'cidade' => 'Rio Grande',
            'bairro' => 'Barra',
            'cep' => 96023409,
            'estado' => 'Rio Grande do Sul',
            'created_at' => date('Y-m-d h:i:s'),
            'updated_at' => date('Y-m-d h:i:s')
        ]);
    }
}

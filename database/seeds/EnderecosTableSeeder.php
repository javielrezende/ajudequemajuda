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
            'rua' => 'Tiradentes',
            'numero' => 1520,
            'complemento' => 'Casa 14',
            'cidade' => 'Pinheiro Machado',
            'bairro' => 'Centro',
            'cep' => 96470000,
            'estado' => 'Rio Grande do Sul',
            'created_at' => date('Y-m-d h:i:s'),
            'updated_at' => date('Y-m-d h:i:s')
        ]);

        DB::table('enderecos')->insert([
            'rua' => 'Olavo Bilac',
            'numero' => 716,
            'complemento' => '',
            'cidade' => 'Pelotas',
            'bairro' => 'Fragata',
            'cep' => 96030400,
            'estado' => 'Rio Grande do Sul',
            'created_at' => date('Y-m-d h:i:s'),
            'updated_at' => date('Y-m-d h:i:s')
        ]);

        DB::table('enderecos')->insert([
            'rua' => 'Jose de Alencar',
            'numero' => 60,
            'complemento' => '',
            'cidade' => 'Pelotas',
            'bairro' => 'Fátima',
            'cep' => 96230000,
            'estado' => 'Rio Grande do Sul',
            'created_at' => date('Y-m-d h:i:s'),
            'updated_at' => date('Y-m-d h:i:s')
        ]);
        DB::table('enderecos')->insert([
            'rua' => 'Dutra de Andrade',
            'numero' => 45,
            'complemento' => 'Andar 2',
            'cidade' => 'Pelotas',
            'bairro' => 'Centro',
            'cep' => 96233344,
            'estado' => 'Rio Grande do Sul',
            'created_at' => date('Y-m-d h:i:s'),
            'updated_at' => date('Y-m-d h:i:s')
        ]);
    }
}

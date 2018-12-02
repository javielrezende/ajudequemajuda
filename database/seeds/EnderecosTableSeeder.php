<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

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
            'rua' => 'Rua Rolante',
            'numero' => 100,
            'complemento' => '',
            'cidade' => 'São Leopoldo',
            'bairro' => 'Vicentina',
            'cep' => 93025250,
            'estado' => 'Rio Grande do Sul',
            'created_at' => date('Y-m-d h:i:s'),
            'updated_at' => date('Y-m-d h:i:s')
        ]);
        DB::table('enderecos')->insert([
            'rua' => 'Rua Say Marques',
            'numero' => 54,
            'complemento' => '',
            'cidade' => 'Porto Alegre',
            'bairro' => 'Aberta dos Morros',
            'cep' => 91787219,
            'estado' => 'Rio Grande do Sul',
            'created_at' => date('Y-m-d h:i:s'),
            'updated_at' => date('Y-m-d h:i:s')
        ]);

        DB::table('enderecos')->insert([
            'rua' => 'Rua das Camélias',
            'numero' => 33,
            'complemento' => '',
            'cidade' => 'Caxias do Sul',
            'bairro' => 'Cinquentenario',
            'cep' => 95012120,
            'estado' => 'Rio Grande do Sul',
            'created_at' => date('Y-m-d h:i:s'),
            'updated_at' => date('Y-m-d h:i:s')
        ]);

        DB::table('enderecos')->insert([
            'rua' => 'Travessa Bosque',
            'numero' => 67,
            'complemento' => '',
            'cidade' => 'Porto Alegre',
            'bairro' => 'Lomba do Pinheiro',
            'cep' => 91787245,
            'estado' => 'Rio Grande do Sul',
            'created_at' => date('Y-m-d h:i:s'),
            'updated_at' => date('Y-m-d h:i:s')
        ]);

        DB::table('enderecos')->insert([
            'rua' => 'Rua Fernando Barata Silva',
            'numero' => 100,
            'complemento' => '',
            'cidade' => 'Porto Alegre',
            'bairro' => 'Mario Quintana',
            'cep' => 91250745,
            'estado' => 'Rio Grande do Sul',
            'created_at' => date('Y-m-d h:i:s'),
            'updated_at' => date('Y-m-d h:i:s')
        ]);

        DB::table('enderecos')->insert([
            'rua' => 'Rua Rufino Pereira dos Santos',
            'numero' => 120,
            'complemento' => '',
            'cidade' => 'Passo Fundo',
            'bairro' => 'Sao Cristovao',
            'cep' => 99060320,
            'estado' => 'Rio Grande do Sul',
            'created_at' => date('Y-m-d h:i:s'),
            'updated_at' => date('Y-m-d h:i:s')
        ]);

        DB::table('enderecos')->insert([
            'rua' => 'Beco da Facada',
            'numero' => 132,
            'complemento' => '',
            'cidade' => 'Cruz Alta',
            'bairro' => 'Esperanca',
            'cep' => 98020042,
            'estado' => 'Rio Grande do Sul',
            'created_at' => date('Y-m-d h:i:s'),
            'updated_at' => date('Y-m-d h:i:s')
        ]);

        DB::table('enderecos')->insert([
            'rua' => 'Avenida República',
            'numero' => 600,
            'complemento' => '',
            'cidade' => 'Pelotas',
            'bairro' => 'Areal',
            'cep' => 96077230,
            'estado' => 'Rio Grande do Sul',
            'created_at' => date('Y-m-d h:i:s'),
            'updated_at' => date('Y-m-d h:i:s')
        ]);

        DB::table('enderecos')->insert([
            'rua' => 'Rua Joao Scarpini',
            'numero' => 200,
            'complemento' => '',
            'cidade' => 'Caxias do Sul',
            'bairro' => 'Sao Jose',
            'cep' => 95043630,
            'estado' => 'Rio Grande do Sul',
            'created_at' => date('Y-m-d h:i:s'),
            'updated_at' => date('Y-m-d h:i:s')
        ]);

        DB::table('enderecos')->insert([
            'rua' => 'Rua Edgar Leopoldo Feldmann',
            'numero' => 1200,
            'complemento' => '',
            'cidade' => 'Sao Leopoldo',
            'bairro' => 'Feitoria',
            'cep' => 93054475,
            'estado' => 'Rio Grande do Sul',
            'created_at' => date('Y-m-d h:i:s'),
            'updated_at' => date('Y-m-d h:i:s')
        ]);

        DB::table('enderecos')->insert([
            'rua' => 'Rua Progresso',
            'numero' => 55,
            'complemento' => '',
            'cidade' => 'Porto Alegre',
            'bairro' => 'Sarandi',
            'cep' => 91140360,
            'estado' => 'Rio Grande do Sul',
            'created_at' => date('Y-m-d h:i:s'),
            'updated_at' => date('Y-m-d h:i:s')
        ]);

        DB::table('enderecos')->insert([
            'rua' => 'Rua Olavo Bilac',
            'numero' => 78,
            'complemento' => '',
            'cidade' => 'Santa Cruz do Sul',
            'bairro' => 'Goias',
            'cep' => 96810290,
            'estado' => 'Rio Grande do Sul',
            'created_at' => date('Y-m-d h:i:s'),
            'updated_at' => date('Y-m-d h:i:s')
        ]);

        DB::table('enderecos')->insert([
            'rua' => 'Praça Cel. Pedro Osório',
            'numero' => 101,
            'complemento' => '',
            'cidade' => 'Pelotas',
            'bairro' => 'Centro',
            'cep' => 96010150,
            'estado' => 'Rio Grande do Sul',
            'created_at' => date('Y-m-d h:i:s'),
            'updated_at' => date('Y-m-d h:i:s')
        ]);
    }
}

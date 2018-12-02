<?php

use Illuminate\Database\Seeder;

class CampanhasTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        //        ------------------------1-----------------------
        DB::table('campanhas')->insert([
            'nome' => 'Doação de Roupas',
            'descricao' => 'Doamos roupas para o frio',
            'status' => '1',
            'destaque' => '1',
            'dataInicio' => '2018-12-27',
            'dataFim' => '2018-12-30',
            'created_at' => date('Y-m-d h:i:s'),
            'updated_at' => date('Y-m-d h:i:s')
        ]);

        //        ------------------------2-----------------------
        DB::table('campanhas')->insert([
            'nome' => 'Doação de Cobertores',
            'descricao' => 'Doamos cobertores para o frio',
            'status' => '1',
            'destaque' => '1',
            'dataInicio' => '2018-12-27',
            'dataFim' => '2018-12-30',
            'created_at' => date('Y-m-d h:i:s'),
            'updated_at' => date('Y-m-d h:i:s')
        ]);

        //        ------------------------3-----------------------
        DB::table('campanhas')->insert([
            'nome' => 'Leitura para crianças',
            'descricao' => 'Leitura para crianças em casas de apoio social',
            'status' => '1',
            'destaque' => '1',
            'dataInicio' => '2018-12-27',
            'dataFim' => '2018-12-30',
            'created_at' => date('Y-m-d h:i:s'),
            'updated_at' => date('Y-m-d h:i:s')
        ]);

        //        ------------------------4-----------------------
        DB::table('campanhas')->insert([
            'nome' => 'Leitura para idosos',
            'descricao' => 'Leitura para idosos em casas de geriatria',
            'status' => '1',
            'destaque' => '1',
            'dataInicio' => '2018-12-27',
            'dataFim' => '2018-12-30',
            'created_at' => date('Y-m-d h:i:s'),
            'updated_at' => date('Y-m-d h:i:s')
        ]);

        //        ------------------------5-----------------------
        DB::table('campanhas')->insert([
            'nome' => 'Alimentos para um Sopão',
            'descricao' => 'Recolhemos mantimentos para comida de rua',
            'status' => '1',
            'destaque' => '1',
            'dataInicio' => '2018-12-10',
            'dataFim' => '2018-12-27',
            'created_at' => date('Y-m-d h:i:s'),
            'updated_at' => date('Y-m-d h:i:s')
        ]);

        //        ------------------------6-----------------------
        DB::table('campanhas')->insert([
            'nome' => 'Alimentos para um Feijão',
            'descricao' => 'Recolhemos mantimentos para comida de rua',
            'status' => '1',
            'destaque' => '1',
            'dataInicio' => '2018-12-11',
            'dataFim' => '2018-12-28',
            'created_at' => date('Y-m-d h:i:s'),
            'updated_at' => date('Y-m-d h:i:s')
        ]);

        //        ------------------------7-----------------------
        DB::table('campanhas')->insert([
            'nome' => 'Doação de brinquedos para o Natal',
            'descricao' => 'Recolhemos brinquedos em bom estado',
            'status' => '1',
            'destaque' => '1',
            'dataInicio' => '2018-12-11',
            'dataFim' => '2018-12-28',
            'created_at' => date('Y-m-d h:i:s'),
            'updated_at' => date('Y-m-d h:i:s')
        ]);

        //        ------------------------8-----------------------
        DB::table('campanhas')->insert([
            'nome' => 'Auxílio para realização de comidas diariamente',
            'descricao' => 'Precisamos de mão de obra para realização de comidas para os carentes',
            'status' => '1',
            'destaque' => '1',
            'dataInicio' => null,
            'dataFim' => null,
            'created_at' => date('Y-m-d h:i:s'),
            'updated_at' => date('Y-m-d h:i:s')
        ]);

        //        ------------------------9-----------------------
        DB::table('campanhas')->insert([
            'nome' => 'Arrecadação de dinheiro para Hospital Espírita',
            'descricao' => 'Precisamos de contribuições para manter o Hospital Espírita',
            'status' => '1',
            'destaque' => '1',
            'dataInicio' => null,
            'dataFim' => null,
            'created_at' => date('Y-m-d h:i:s'),
            'updated_at' => date('Y-m-d h:i:s')
        ]);

        //        ------------------------10-----------------------
        DB::table('campanhas')->insert([
            'nome' => 'Auxílio para matermos o Hospital Espírita',
            'descricao' => 'Precisamos de pessoas para auxílio e ajuda no Hospital Espírita',
            'status' => '1',
            'destaque' => '1',
            'dataInicio' => null,
            'dataFim' => null,
            'created_at' => date('Y-m-d h:i:s'),
            'updated_at' => date('Y-m-d h:i:s')
        ]);
    }
}

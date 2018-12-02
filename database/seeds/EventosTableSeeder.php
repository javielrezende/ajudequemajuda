<?php

use Illuminate\Database\Seeder;

class EventosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //------------------------1-----------------------
        DB::table('eventos')->insert([
            'nome' => 'Entrega de roupas para o frio',
            'descricao' => 'Entregamos roupas para o frio',
            'dataHoraInicio' => '2018-05-18',
            'dataHoraInicio1' => '18:00:00',
            'dataHoraFim' => '2018-05-18',
            'dataHoraFim1' => '22:00:00',
            'status' => 1,
            'campanhas_id' => 1,
            'enderecos_id' => 13,
            'created_at' => date('Y-m-d h:i:s'),
            'updated_at' => date('Y-m-d h:i:s')
        ]);

        //------------------------2-----------------------
        DB::table('eventos')->insert([
            'nome' => 'Entrega de cobertores para o frio',
            'descricao' => 'Entregamos cobertores para o frio',
            'dataHoraInicio' => '2018-05-18',
            'dataHoraInicio1' => '18:00:00',
            'dataHoraFim' => '2018-05-18',
            'dataHoraFim1' => '22:00:00',
            'status' => 1,
            'campanhas_id' => 2,
            'enderecos_id' => 13,
            'created_at' => date('Y-m-d h:i:s'),
            'updated_at' => date('Y-m-d h:i:s')
        ]);

        //------------------------3-----------------------
        DB::table('eventos')->insert([
            'nome' => 'Leitura para crianças',
            'descricao' => 'Nos encontraremos no local para leitura para crianças',
            'dataHoraInicio' => '2018-05-18',
            'dataHoraInicio1' => '13:00:00',
            'dataHoraFim' => '2018-05-18',
            'dataHoraFim1' => '17:00:00',
            'status' => 1,
            'campanhas_id' => 3,
            'enderecos_id' => 13,
            'created_at' => date('Y-m-d h:i:s'),
            'updated_at' => date('Y-m-d h:i:s')
        ]);

        //------------------------4-----------------------
        DB::table('eventos')->insert([
            'nome' => 'Leitura para idosos',
            'descricao' => 'Nos encontraremos no local para leitura para idosos',
            'dataHoraInicio' => '2018-05-18',
            'dataHoraInicio1' => '13:00:00',
            'dataHoraFim' => '2018-05-18',
            'dataHoraFim1' => '17:00:00',
            'status' => 1,
            'campanhas_id' => 4,
            'enderecos_id' => 13,
            'created_at' => date('Y-m-d h:i:s'),
            'updated_at' => date('Y-m-d h:i:s')
        ]);

        //------------------------5-----------------------
        DB::table('eventos')->insert([
            'nome' => 'Sopão de rua',
            'descricao' => 'Faremos um sopão de rua para entregar aos moradores que necessitam',
            'dataHoraInicio' => '2018-05-18',
            'dataHoraInicio1' => '14:00:00',
            'dataHoraFim' => '2018-05-18',
            'dataHoraFim1' => '23:00:00',
            'status' => 1,
            'campanhas_id' => 5,
            'enderecos_id' => 13,
            'created_at' => date('Y-m-d h:i:s'),
            'updated_at' => date('Y-m-d h:i:s')
        ]);

        //------------------------6-----------------------
        DB::table('eventos')->insert([
            'nome' => 'Feijão na cumbuca',
            'descricao' => 'Faremos um feijão de rua para entregar aos moradores que necessitam',
            'dataHoraInicio' => '2018-05-18',
            'dataHoraInicio1' => '14:00:00',
            'dataHoraFim' => '2018-05-18',
            'dataHoraFim1' => '23:00:00',
            'status' => 1,
            'campanhas_id' => 6,
            'enderecos_id' => 13,
            'created_at' => date('Y-m-d h:i:s'),
            'updated_at' => date('Y-m-d h:i:s')
        ]);

        //------------------------7-----------------------
        DB::table('eventos')->insert([
            'nome' => 'Entregaremos brinquedos para os lares de adoção',
            'descricao' => 'Entrega de brinquedos recolhidos',
            'dataHoraInicio' => '2018-12-17',
            'dataHoraInicio1' => '14:00:00',
            'dataHoraFim' => '2018-12-17',
            'dataHoraFim1' => '20:00:00',
            'status' => 1,
            'campanhas_id' => 7,
            'enderecos_id' => 13,
            'created_at' => date('Y-m-d h:i:s'),
            'updated_at' => date('Y-m-d h:i:s')
        ]);

        //------------------------8-----------------------
        DB::table('eventos')->insert([
            'nome' => 'Entrega das comidas preparadas',
            'descricao' => 'Entrega de alimentos',
            'dataHoraInicio' => '2018-12-17',
            'dataHoraInicio1' => '18:00:00',
            'dataHoraFim' => '2018-12-17',
            'dataHoraFim1' => '20:00:00',
            'status' => 1,
            'campanhas_id' => 8,
            'enderecos_id' => 13,
            'created_at' => date('Y-m-d h:i:s'),
            'updated_at' => date('Y-m-d h:i:s')
        ]);

        //------------------------9-----------------------
        DB::table('eventos')->insert([
            'nome' => 'Compras de necessidades do Hospital',
            'descricao' => 'Compras de materiais em final de estoque',
            'dataHoraInicio' => '2018-12-17',
            'dataHoraInicio1' => '18:00:00',
            'dataHoraFim' => '2018-12-17',
            'dataHoraFim1' => '20:00:00',
            'status' => 1,
            'campanhas_id' => 9,
            'enderecos_id' => 13,
            'created_at' => date('Y-m-d h:i:s'),
            'updated_at' => date('Y-m-d h:i:s')
        ]);

        //------------------------10-----------------------
        DB::table('eventos')->insert([
            'nome' => 'Limpeza do prédio',
            'descricao' => 'Precisamos de voluntários para auxílio na limpeza',
            'dataHoraInicio' => '2018-12-17',
            'dataHoraInicio1' => '12:00:00',
            'dataHoraFim' => '2018-12-17',
            'dataHoraFim1' => '16:00:00',
            'status' => 1,
            'campanhas_id' => 10,
            'enderecos_id' => 13,
            'created_at' => date('Y-m-d h:i:s'),
            'updated_at' => date('Y-m-d h:i:s')
        ]);

    }
}

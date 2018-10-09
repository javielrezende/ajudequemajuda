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
        DB::table('eventos')->insert([
            'nome' => 'Entrega de cobertores Tecon',
            'descricao' => 'Evento para entrega de cobertores da empresa Tecon',
            'dataHoraInicio' => null,
            'dataHoraInicio' => null,
            'dataHoraFim' => null,
            'dataHoraFim' => null,
            'status' => 1,
            'campanhas_id' => 1,
            'enderecos_id' => 2,
            'created_at' => date('Y-m-d h:i:s'),
            'updated_at' => date('Y-m-d h:i:s')
        ]);

        DB::table('eventos')->insert([
            'nome' => 'Sopão de rua Yara',
            'descricao' => 'Evento para elaboração e entrega de sopão para moradores de rua',
            'dataHoraInicio' => null,
            'dataHoraInicio' => null,
            'dataHoraFim' => null,
            'dataHoraFim' => null,
            'status' => 1,
            'campanhas_id' => 2,
            'enderecos_id' => 2,
            'created_at' => date('Y-m-d h:i:s'),
            'updated_at' => date('Y-m-d h:i:s')
        ]);
    }
}

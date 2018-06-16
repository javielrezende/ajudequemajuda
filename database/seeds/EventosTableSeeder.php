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
            'descricao' => 'Evento entrega cobertores Tecon',
            'dataInicio' => null,
            'dataFim' => null,
            'status' => 1,
            'campanhas_id' => 1,
            'enderecos_id' => 2,
            'created_at' => date('Y-m-d h:i:s'),
            'updated_at' => date('Y-m-d h:i:s')
        ]);
    }
}

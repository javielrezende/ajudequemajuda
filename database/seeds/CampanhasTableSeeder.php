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
        DB::table('campanhas')->insert([
            'nome' => 'Doação Tecon',
            'descricao' => 'Doamos roupas e cobertas para o frio',
            'status' => '1',
            'dataInicio' => null,
            'dataFim' => null,
            'created_at' => date('Y-m-d h:i:s'),
            'updated_at' => date('Y-m-d h:i:s')
        ]);
    }
}

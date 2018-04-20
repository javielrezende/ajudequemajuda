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
            'nome' => 'Sopão da Solidariedade',
            'descricao' => 'Ajude com a colaboração dos alimentos para o sopao desta semana!',
            'urgencia' => 'feijão',
            'created_at' => date('Y-m-d h:i:s'),
            'updated_at' => date('Y-m-d h:i:s')
        ]);
    }
}

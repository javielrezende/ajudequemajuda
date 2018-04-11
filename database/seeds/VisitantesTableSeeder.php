<?php

use Illuminate\Database\Seeder;

class VisitantesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('entidades')->insert([
            'nome' => 'Rogerio Flausino',
            'email' => 'rogerio@gmail.com',
            'mensagem' => 'Desejo ser uma entidade cadastada no sistema',
            'solicitacao_entidade' => 1,
            'created_at' => date('Y-m-d h:i:s'),
            'updated_at' => date('Y-m-d h:i:s')
        ]);
    }
}

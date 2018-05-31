<?php

use Illuminate\Database\Seeder;

class UserCampanhasTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('user_campanha_curtida_interesses')->insert([
            'users_id' => 2,
            'campanhas_id' => 1,
            'curtidas' => null,
            'interesse' => null,
            'created_at' => date('Y-m-d h:i:s'),
            'updated_at' => date('Y-m-d h:i:s')
        ]);
    }

}

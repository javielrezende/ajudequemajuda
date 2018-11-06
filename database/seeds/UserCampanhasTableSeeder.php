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
        DB::table('user_campanhas')->insert([
            'users_id' => 2,
            'campanhas_id' => 1,
            'created_at' => date('Y-m-d h:i:s'),
            'updated_at' => date('Y-m-d h:i:s')
        ]);

        DB::table('user_campanhas')->insert([
            'users_id' => 2,
            'campanhas_id' => 2,
            'created_at' => date('Y-m-d h:i:s'),
            'updated_at' => date('Y-m-d h:i:s')
        ]);

        DB::table('user_campanhas')->insert([
            'users_id' => 3,
            'campanhas_id' => 3,
            'created_at' => date('Y-m-d h:i:s'),
            'updated_at' => date('Y-m-d h:i:s')
        ]);
    }

}

<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(EnderecosTableSeeder::class);
        $this->call(EntidadesTableSeeder::class);
        $this->call(CampanhasTableSeeder::class);
        $this->call(VisitantesTableSeeder::class);
    }
}

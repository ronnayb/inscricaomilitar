<?php

use Illuminate\Database\Seeder;

class NiveisSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('niveis')->insert(['nivel' => 'ENSINO FUNDAMENTAL - 6 AO 9° ANO']);
        DB::table('niveis')->insert(['nivel' => 'ENSINO MÉDIO - 1° A 3° SÉRIE']);
    }
}

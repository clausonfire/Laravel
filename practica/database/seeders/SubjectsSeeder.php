<?php

namespace Database\Seeders;
use Faker\Factory as Faker;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SubjectsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    
        DB::table('subjects')->insert([
            'nombre' => 'DWES',
        ]);

        DB::table('subjects')->insert([
            'nombre' => 'DWEC',

        ]);

        DB::table('subjects')->insert([
            'nombre' => 'FOL',

        ]);
    }
}

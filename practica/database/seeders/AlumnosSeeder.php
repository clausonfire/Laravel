<?php

namespace Database\Seeders;

use Faker\Factory as Faker;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AlumnosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        //esto es como el FROM pets
        
        DB::table('alumnos')->insert([
            'nombre' => 'Jesus',
            'telefono' => '45245435',
            'edad' => 22,
            'password' => 'smashplays',
            'email' => 'jesusitoB@gmail.com',
            'sexo' => 'masc'
        ]);

        DB::table('alumnos')->insert([
            'nombre' => 'takariko',
            'telefono' => '16283745',
            'edad' => 22,
            'password' => 'lowenico',
            'email' => 'aaaaaaaa@gmail.com',
            'sexo' => 'masc'
        ]);
        
        DB::table('alumnos')->insert([
            'nombre' => 'diana',
            'telefono' => '192837465',
            'edad' => 22,
            'password' => 'homewolf',
            'email' => 'eeeeeee@gmail.com',
            'sexo' => 'fem'
        ]);

        DB::table('alumnos')->insert([
            'nombre' => 'humano 1',
            'telefono' => '62833844',
            'edad' => 22,
            'password' => 'humano 1',
            'email' => 'eeewqee@gmail.com',
            'sexo' => 'masc'
        ]);

        DB::table('alumnos')->insert([
            'nombre' => 'humano 2',
            'telefono' => '666666665',
            'edad' => 22,
            'password' => 'humano 2',
            'email' => 'eerr@gmail.com',
            'sexo' => 'masc'
        ]);

        DB::table('alumnos')->insert([
            'nombre' => 'humano 3',
            'telefono' => '666666664',
            'edad' => 22,
            'password' => 'humano 3',
            'email' => 'eegtfd@gmail.com',
            'sexo' => 'fem'
        ]);
    }
}

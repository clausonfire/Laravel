<?php

namespace Database\Seeders;
use Faker\Factory as Faker;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TeachersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        DB::table('teachers')->insert([
            'nombre' => 'Brugarolas',
            'asignatura'=> 'DWES',
            'telefono' => '111222333',
            'edad' => 24,
            'password' => '123456',
            'email' => 'brugui7@gmail.com',
            'sexo' => 'masc',
            'subject_id' => 1

        ]);
        DB::table('teachers')->insert([
            'nombre' => 'Miguel',
            'asignatura'=> 'DAW',
            'telefono' => '666666666',
            'edad' => 26,
            'password' => '123456',
            'email' => 'miguel@gmail.com',
            'sexo' => 'masc',
            'subject_id' => 2

        ]);
        DB::table('teachers')->insert([
            'nombre' => 'Fuster',
            'asignatura'=> 'DIW',
            'telefono' => '321321321',
            'edad' => 23,
            'password' => '123456',
            'email' => 'fuster@gmail.com',
            'sexo' => 'masc',
            'subject_id' => 3

        ]);
    }
}

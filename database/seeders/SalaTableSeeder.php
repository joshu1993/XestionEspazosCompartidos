<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SalaTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('salas')->insert([
            [
                'nombre' => 'Aula3.1',
                'descripcion' => 'aula con muy buena luz',
                'metrosCuadrados' => 100,
                'aforo' => 110,
                'proyector'=> 'No',
                'color' =>' #eca1a6'
                
            ],
            [
                'nombre' => 'Aula2.1',
                'descripcion' => 'aula con buena acustica',
                'metrosCuadrados' => 60,
                'aforo' => 60,
                'proyector'=> 'Si',
                'color' =>'#92a8d1'
                
            ],
            [
                'nombre' => 'Aula1.1',
                'descripcion' => 'aula cerca de las escaleras',
                'metrosCuadrados' => 80,
                'aforo' => 70,
                'proyector'=> 'Si',
                'color' =>'#b5e7a0'
               
            ],
            [
                'nombre' => 'laboratorio3.7',
                'descripcion' => 'aula para pequeñas reuniones',
                'metrosCuadrados' => 20,
                'aforo' => 8,
                'proyector'=> 'Si',
                'color' =>'#18C20D'
               
            ],
            [
                'nombre' => 'laboratorio3.8',
                'descripcion' => 'aula para pequeñas reuniones',
                'metrosCuadrados' => 20,
                'aforo' => 8,
                'proyector'=> 'Si',
                'color' =>'#C2B70D'
               
            ],
            [
                'nombre' => 'laboratorio3.9',
                'descripcion' => 'aula para pequeñas reuniones',
                'metrosCuadrados' => 20,
                'aforo' => 8,
                'proyector'=> 'Si',
                'color' =>'#C2720D'
               
            ]
        ]);
    }
}

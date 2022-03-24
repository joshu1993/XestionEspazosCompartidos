<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Role;
use Illuminate\Support\Facades\DB;

class RoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        DB::table('roles')->insert([
        	['id' => 1, 'nombreRol' => 'Administrador'],
            ['id' => 2, 'nombreRol' => 'Profesor'],
            ['id' => 3, 'nombreRol' => 'Alumno'],
           // ['id' => 4, 'nombreRol' => 'UsuarioNoRegistrado'],
        ]);
        
    }
}

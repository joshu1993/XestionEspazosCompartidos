<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use App\Models\Role;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            ['name' => 'admin','dni'=>'44567809P','email' => 'admin@uvigo.com','password' => bcrypt('admin2021'),'role_id' => 1],
            ['name' => 'profesor','dni'=>'45566778L','email' => 'profesor@uvigo.com','password' => bcrypt('profesor2021'),'role_id' => 2],
            ['name' => 'alumno','dni'=>'48977654J','email' => 'alumno@uvigo.com','password' => bcrypt('alumno2021'),'role_id' => 3]
        ]);
    }
}

<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Sala;
use App\Models\Role;

class SalaRoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('sala_roles')->insert([
            
            ['sala_id'=>1,'role_id' => 2],
            
            ['sala_id'=>2,'role_id' => 2],
            
            ['sala_id'=>3,'role_id' => 2],
            
            ['sala_id'=>4,'role_id' => 2],
            ['sala_id'=>4,'role_id' => 3],
           
            ['sala_id'=>5,'role_id' => 2],
            ['sala_id'=>5,'role_id' => 3],
            
            ['sala_id'=>6,'role_id' => 2],
            ['sala_id'=>6,'role_id' => 3],
        ]);
    }
}

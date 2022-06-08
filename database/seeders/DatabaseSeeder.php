<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        
        $this->call(RoleTableSeeder::class);
        $this->call(UserTableSeeder::class);
        $this->call(SalaTableSeeder::class);
        $this->call(ImageTableSeeder::class);
        $this->call(SalaRoleTableSeeder::class);
    }
}

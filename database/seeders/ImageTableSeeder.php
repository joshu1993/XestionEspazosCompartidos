<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Image;
use App\Models\Sala;

class ImageTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('images')->insert([
            ['image' => 'aula.PNG','sala_id'=> 1],
            
            ['image' => 'aula.PNG','sala_id'=> 2],
           
            ['image' => 'aula.PNG','sala_id'=> 3],
            
            ['image' => 'laboratorio.PNG','sala_id'=> 4],
            
            ['image' => 'laboratorio.PNG','sala_id'=> 5],
           
            ['image' => 'laboratorio.PNG','sala_id'=> 6]
         
            
        ]);
    }
}

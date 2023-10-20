<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{
         /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories=[
         ["name"=>"Problemas de hardware"],  
         ["name"=>"Solicitud de permisos"],
         ["name"=>"Reestablecimiento de contraseña"]
        ];
        foreach ($categories as $category) {
            $this->attemptInsertion($category);
        }
    }
    /**
     * Intenta insertar un registro
     *
     * @param array{id:string,description:string} $record
     * @return void
     **/
    private function attemptInsertion(array $category):void
    {
        DB::table('categories')->insert($category);
    }    
}
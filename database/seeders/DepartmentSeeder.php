<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DepartmentSeeder extends Seeder
{
   
         /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $departments=[
         ["name"=>"Ventas", "created_at"=>now(),"updated_at"=>now()],
         ["name"=>"RRHH",  "created_at"=>now(),"updated_at"=>now()],
         ["name"=>"IT", "created_at"=>now(), "updated_at"=>now()]
        ];
        foreach ($departments as $department) {
            $this->attemptInsertion($department);
        }
    }
    /**
     * Intenta insertar un registro
     *
     * @param array{id:string,description:string} $record
     * @return void
     **/
    private function attemptInsertion(array $department):void
    {
       
            DB::table('departments')->insert($department);
       
    }
        
    }

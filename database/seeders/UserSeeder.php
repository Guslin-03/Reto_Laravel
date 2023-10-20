<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder{

    /**
     * Run the database seeds.
     */
    public function run(): void{
        $users=[
            ["name"=>"David", "email"=>"david@ventas.com", 
            "password"=> Hash::make("12341234") , "department_id"=>"1" ,
            "created_at"=>now(),"updated_at"=>now()],  
            ["name"=>"Joana", "email"=>"joana@rrhh.com", 
            "password"=>Hash::make("12341234") , "department_id"=>"2" ,
            "created_at"=>now(),"updated_at"=>now()],
            ["name"=>"Elon Musk", "email"=>"elon@it.com", 
            "password"=>Hash::make("12341234") , "department_id"=>"3" ,
            "created_at"=>now(),"updated_at"=>now()]
           ];
           foreach ($users as $user) {
               $this->attemptInsertion($user);
           }
    }
     /**
     * Intenta insertar un registro
     *
     * @param array{id:string,description:string} $record
     * @return void
     **/
    private function attemptInsertion(array $user):void
    {
       
        DB::table('users')->insert($user);
       
    }
}
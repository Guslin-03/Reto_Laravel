<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PrioritySeeder extends Seeder
{
      /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $priorities=[
         ["name"=>"Alta","priority"=>5],
         ["name"=>"Media","priority"=>3],
         ["name"=>"Baja","priority"=>1]
        ];
        foreach ($priorities as $priority) {
            $this->attemptInsertion($priority);
        }
    }
    /**
     * Intenta insertar un registro
     *
     * @param array{id:string,description:string} $record
     * @return void
     **/
    private function attemptInsertion(array $priority):void
    {

        DB::table('priorities')->insert($priority);

    }

    }

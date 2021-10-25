<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UbicacionSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('ubicacions')->insert([
            'nombre'=> 'Bogotá', 
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        DB::table('ubicacions')->insert([
            'nombre'=> 'Cali', 
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        DB::table('ubicacions')->insert([
            'nombre'=> 'Medellin', 
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        DB::table('ubicacions')->insert([
            'nombre'=> 'Barranquilla', 
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        DB::table('ubicacions')->insert([
            'nombre'=> 'Bucaramanga', 
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

    }
}

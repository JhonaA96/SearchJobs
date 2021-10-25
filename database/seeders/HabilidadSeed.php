<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class HabilidadSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('habilidades')->insert([
            'nombre'=> 'Habilidad 1', 
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        DB::table('habilidades')->insert([
            'nombre'=> 'Habilidad 2', 
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        DB::table('habilidades')->insert([
            'nombre'=> 'Habilidad 3', 
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        DB::table('habilidades')->insert([
            'nombre'=> 'Habilidad 4', 
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        DB::table('habilidades')->insert([
            'nombre'=> 'Habilidad 5', 
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        DB::table('habilidades')->insert([
            'nombre'=> 'Habilidad 6', 
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        DB::table('habilidades')->insert([
            'nombre'=> 'Habilidad 7', 
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        DB::table('habilidades')->insert([
            'nombre'=> 'Habilidad 8', 
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        DB::table('habilidades')->insert([
            'nombre'=> 'Habilidad 9', 
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        DB::table('habilidades')->insert([
            'nombre'=> 'Habilidad 10', 
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
    }
}

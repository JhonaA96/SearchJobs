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
        // \App\Models\User::factory(10)->create();
        $this->call(UsuarioSeed::class);
        $this->call(CategoriaSeed::class);
        $this->call(ExperienciaSeed::class);
        $this->call(UbicacionSeed::class);
        $this->call(SalarioSeed::class);
        $this->call(HabilidadSeed::class);
    }
}

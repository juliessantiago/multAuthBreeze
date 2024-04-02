<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\HorariosLivres;
use Illuminate\Database\Seeder;
use Database\Seeders\HorariosLivresSeeder; 

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        \App\Models\Admin::factory(1)->create();
        \App\Models\User::factory(10)->create();
        $this->call(HorariosLivresSeeder::class);
        $this->call(VoluntarioSeeder::class);
    }

     
    
}

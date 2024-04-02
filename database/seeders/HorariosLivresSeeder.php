<?php

namespace Database\Seeders;

use App\Models\HorariosLivres;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class HorariosLivresSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        HorariosLivres::factory()->count(15)->create(); 
    }
}

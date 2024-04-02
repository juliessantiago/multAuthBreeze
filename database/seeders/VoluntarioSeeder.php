<?php

namespace Database\Seeders;

use App\Models\Voluntarios;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class VoluntarioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Voluntarios::factory()->count(5)->create(); 
    }
}

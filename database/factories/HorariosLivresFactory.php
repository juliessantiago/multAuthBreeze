<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\HorariosLivres>
 */
class HorariosLivresFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    
    public function definition(): array
    {
     
        return [
            'diaSemana' => $this->faker->dayOfWeek(), 
            'inicioExpediente' => $this->faker->time('H:i'), 
            'fimExpediente' => $this->faker->time('H:i'), 
        ];
    }
}

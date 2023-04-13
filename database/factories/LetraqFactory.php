<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Letraq>
 */
class LetraqFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'letraq' => fake()->sentence(14),
            'tipo' => fake()->text(''),
            'modelo' => fake()->text('')
          
        ];
    }
}

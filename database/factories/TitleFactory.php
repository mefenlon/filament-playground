<?php

namespace Database\Factories;

use App\Models\Title;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Title>
 */
class TitleFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'sort_title' => fake()->unique()->words(rand(3,7), true),
            'display_title' => fake()->randomElement(['',fake()->unique()->words(rand(3,7), true)]),
            'abbreviation' => fake()->unique()->countryISOAlpha3(),
        ];
    }
}

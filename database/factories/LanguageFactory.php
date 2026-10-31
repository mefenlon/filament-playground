<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\City>
 */
class LanguageFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => fake()->unique()->languageCode(),
        ];
    }

    public function withDateRanges(): static
    {
        return $this->has(
            \App\Models\DateRange::factory()->count(rand(1, 3)),
            'dateRanges'
        );
    }

}

<?php

namespace Database\Factories;

use App\Models\Language;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Language>
 */
class LanguageFactory extends Factory
{

    protected $model = Language::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $countries = [
            'United States' => 'us',
            'Canada' => 'ca',
            'United Kingdom' => 'gb',
            'Australia' => 'au',
            'Germany' => 'de',
            'France' => 'fr',
            'Japan' => 'jp',
            'China' => 'cn',
            // Add more countries and their codes as needed
        ];

        // Randomly select a country and its corresponding code
        $country = fake()->randomElement(array_keys($countries));
        $countryCode = $countries[$country];

        return [
            'name' => $country,
            'code' => $countryCode
        ];
    }
}

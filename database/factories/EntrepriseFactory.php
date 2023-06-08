<?php

namespace Database\Factories;
use App\Models\Auteur;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Entreprise>
 */
class EntrepriseFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'auteur_id' => Auteur::factory(),
            'nom' => $this->faker->randomElement('Technology'),
        ];
    }
}

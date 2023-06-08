<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Conference>
 */
class ConferenceFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {   
        
        $nom = $this->faker->randomElement();
        $sigle = $this->faker->company();
        $theme = $this->faker->city();
        $date_soumission = $this->faker->date();
        $date_remise_resultas =$this->faker->date();
        $date_inscription = $this->faker->date();
        $date_deroulement = $this->faker->date();
           
    
        return [
            'nom' => $nom,
            'theme' => $theme,
            'date_soumission' =>$date_soumission, 
            'date_remise_resultas' =>$date_remise_resultas,
            'date_inscription' => $date_inscription,
            'date_deroulement' => $date_deroulement
        ];
    }
}

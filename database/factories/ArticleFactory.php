<?php

namespace Database\Factories;
use App\Models\Conference;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Article>
 */
class ArticleFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {   
        $name = $this->faker->randomElement(['Technology',  'Education']);
        $description = ($name == 'Technology') ? $this->faker->description() : $this->faker->Education();
        $status = $this->faker->randomElement(['validate','retired','published','changed']);
        return [
            'conference_id' => Conference::factory(),
            'name'=>$name,
            'description'=>$description,
            'status'=>$status,
            'descriptions'=>$this->faker->randomLetter(),
            'fichiers'=>$this->faker->generateFichiers()
            
        ];
    }
}

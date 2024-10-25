<?php

namespace Database\Factories;

use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;

class CategoryFactory extends Factory
{
    protected $model = Category::class;

    public function definition()
    {
        return [
            // Assure-toi que le champ 'name' génère un nom valide
            'name' => $this->faker->unique()->word,
        ];
    }
}

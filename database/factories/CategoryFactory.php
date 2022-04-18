<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Category>
 */
class CategoryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->word(),
            'slug' => \Str::slug($this->faker->sentence(2)),
            'photo' => 'https://picsum.photos/id/'.rand(12, 34).'/272/140'
        ];
    }
}

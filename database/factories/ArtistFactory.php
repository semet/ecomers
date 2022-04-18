<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Artist>
 */
class ArtistFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->name,
            'gender' => 'Male',
            'birth_date' => $this->faker->dateTimeThisCentury,
            'birth_place' => $this->faker->address,
            'specialist' => $this->faker->sentence(5),
            'biography' => $this->faker->paragraph(10)
        ];
    }
}

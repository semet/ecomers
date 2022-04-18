<?php

namespace Database\Factories;

use App\Models\StoreCategory;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Store>
 */
class StoreFactory extends Factory
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
            'store_category_id' => StoreCategory::all()->random()->id,
            'email' => $this->faker->freeEmail(),
            'phone' => $this->faker->phoneNumber(),
            'address' => $this->faker->address(),

        ];
    }
}

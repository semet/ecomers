<?php

namespace Database\Factories;

use Hash;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Customer>
 */
class CustomerFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => 'Hamdani Ash-Sidiq',
            'email' => 'hamdanilombok@gmail.com',
            'phone' => '087736690307',
            'password' => bcrypt('danis3m3t'),
            'gender' => 'Male',

        ];
    }
}

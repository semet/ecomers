<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\BillingAddress>
 */
class BillingAddressFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'customer_id' => '4fb24c52-4209-47c1-b439-e819d6baa680',
            'province_id' => 22,
            'city_id' => 239,
            'zip_code' => '83581',
            'address_line_1' => 'Desa Sengkerang, Praya Timur, Lombok Tengah, Nusa Tenggara Barat',
        ];
    }
}

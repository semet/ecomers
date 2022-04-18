<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\ShippingAddress>
 */
class ShippingAddressFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'customer_id' => '1fc61175-e51f-4fd0-afe8-a9b046456139',
            'province_id' => 22,
            'city_id' => 239,
            'zip_code' => '83581',
            'address_line_1' => 'Desa Sengkerang, Praya Timur, Lombok Tengah, Nusa Tenggara Barat',
        ];
    }
}

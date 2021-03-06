<?php

namespace Database\Factories;

use App\Models\Artist;
use App\Models\Category;
use App\Models\Store;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Arr;
use Illuminate\Support\Str;

class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $color = ['black', 'white', 'green', 'yellow', 'red', 'blue'];
        return [
            'category_id' => Category::all()->random()->id,
            'artist_id' => Artist::all()->random()->id,
            'store_id' => Store::All()->random()->id,
            'code_number' => Str::random(5),
            'slug' => Str::slug($this->faker->sentence()),
            'name' => $this->faker->sentence(2),
            'description' => $this->faker->paragraph(),
            'details' => $this->faker->paragraph(25),
            'latest_price' => rand(1234, 5678),
            'amount' => rand(123, 456),
            'weight' => rand(1, 2),
            'color_family' => Arr::random($color),
            'sold' => rand(123, 456),
            'view' => rand(123, 456),
            'like' => rand(123, 456)

        ];
    }
}

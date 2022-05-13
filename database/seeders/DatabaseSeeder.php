<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
          $this->call([
//             ArtistSeeder::class,
//             CategorySeeder::class,
//             StoreCategoryeeder::class,
//             SellerSeeder::class,
//             ProductSeeder::class,
            // ProductImageSeeder::class,
             //CustomerSeeder::class,
//             LocationSeeder::class
            // CourierSeeder::class,
             //BillingAddressSeeder::class,
             ShippingAddressSeeder::class
         ]);
    }
}

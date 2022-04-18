<?php

namespace Database\Seeders;

use App\Models\Seller;
use App\Models\Store;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SellerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Seller::factory(10)->create()->each(function($seller) {
            $store = Store::factory()->make();
            $seller->store()->save($store);
        });
    }
}

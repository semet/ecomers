<?php

namespace Database\Seeders;

use App\Models\Store;
use App\Models\StoreCategory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class StoreCategoryeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        StoreCategory::factory(15)->create();
    }
}

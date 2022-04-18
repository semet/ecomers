<?php

namespace Database\Seeders;

use App\Models\Courier;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CourierSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            ['code' => 'pos', 'title' => 'POS Indonesia (POS)'],
            ['code' => 'jne', 'title' => 'Jalur Nugraha Ekakurir (JNE)'],
            ['code' => 'tiki', 'title' => 'Citra Van Titipan Kilat (TIKI)'],
            ['code' => 'esl', 'title' => 'Eka Sari Lorena (ESL)'],
        ];

        Courier::insert($data);
    }
}

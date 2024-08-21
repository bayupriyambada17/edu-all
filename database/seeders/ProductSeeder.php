<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $productPath = public_path('amazon_laptop_prices_v01.csv');

        $file = fopen($productPath, 'r');

        while (($data = fgetcsv($file, 0, ',')) !== false) {
            \App\Models\Product::create([
                'brand' => $data[0],
                'model' => $data[1],
                'screen_size' => $data[2],
                'color' => $data[3],
                'harddisk' => $data[4],
                'cpu' => $data[5],
                'ram' => $data[6],
                'os' => $data[7],
                'special_features' => $data[8],
                'graphics' => $data[9],
                'graphics_coprocessor' => $data[10],
                'cpu_speed' => $data[11],
                'rating' => $data[12],
                'price' => $data[13],
            ]);
        }
    }
}

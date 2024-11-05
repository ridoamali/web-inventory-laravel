<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Product::create([
            "name" => "produk 1",
            "description" => "deskripsi produk",
            "sku" => "232444-OK",
            "price" => 28392,
            "stock" => 122,
            "category_id" => 1,
        ]);
    }
}

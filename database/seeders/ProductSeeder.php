<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Product;

class ProductSeeder extends Seeder
{
    public function run()
    {
        // Add sample products
        Product::create([
            'name' => 'Sample Product 1',
            'price' => 99.99,
            'image' => 'sample_image.jpg', // Make sure this file exists in storage/app/public/product_images
            'is_visible' => true,
        ]);

        Product::create([
            'name' => 'Sample Product 2',
            'price' => 49.99,
            'image' => 'sample_image2.jpg', // Make sure this file exists in storage/app/public/product_images
            'is_visible' => true,
        ]);
    }
}

<?php

namespace Database\Seeders;

use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use App\Domain\Products\Models\Product;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class FillProducts extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $products = [
            [
                'name' => 'Man T-shirt',
                'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.',
                'price' => 500.00,
                'thumbnail_image' => 'tshirt-img.png',
                'large_image' => ''
            ],
            [
                'name' => 'Man Shirt',
                'description' => 'Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo.',
                'price' => 1000.00,
                'thumbnail_image' => 'dress-shirt-img.png',
                'large_image' => ''
            ],
            [
                'name' => 'Woman Scart',
                'description' => 'At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident.',
                'price' => 1500.00,
                'thumbnail_image' => 'women-clothes-img.png',
                'large_image' => ''
            ],

        ];

        foreach($products as $productData){

            $productData['slug'] = Str::slug($productData['name']);
            $this->command->info(print_r($productData,1));
            Product::updateOrCreate($productData,['slug'=>$productData['slug']]);

        }
    }
}

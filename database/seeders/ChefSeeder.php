<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Chef;
use App\Models\Product;

class ChefSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
         $product = Product::inRandomOrder()->first();

        Chef::updateOrCreate(
            ['name' => 'Chef Andi'],
            [
                'product_id' => $product?->id,
                'product_name' => $product?->name,
                'facebook_link' => 'https://facebook.com/chefandi',
                'twitter_link' => 'https://twitter.com/chefandi',
                'instagram_link' => 'https://instagram.com/chefandi'
            ]
        );
    }
}

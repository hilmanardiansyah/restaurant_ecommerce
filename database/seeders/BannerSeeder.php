<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Banner;

class BannerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
         foreach (['banners/hero1.jpg','banners/hero2.jpg','banners/hero3.jpg'] as $img) {
            Banner::firstOrCreate(['image' => $img]);
        }
    }
}

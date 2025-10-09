<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\AboutUs;

class AboutUsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        AboutUs::updateOrCreate(
            ['title' => 'Tentang Restoran Kami'],
            [
                'description' => 'Restoran rumahan dengan bahan segar dan halal.',
                'image1' => 'about/img1.jpg',
                'image2' => 'about/img2.jpg',
                'image3' => 'about/img3.jpg',
                'youtube_link' => 'https://youtu.be/dQw4w9WgXcQ'
            ]
        );
    }
}

<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Product;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
          $items = [
            ['Nasi Goreng Spesial', 'Nasi goreng dengan topping komplit', 'products/nasgor.jpg', 25000, 50],
            ['Mie Ayam Jamur', 'Mie ayam kuah kaldu gurih', 'products/mieayam.jpg', 20000, 40],
            ['Es Teh Manis', 'Es teh segar', 'products/esteh.jpg', 8000, 200],
            ['Ayam Bakar Madu', 'Ayam bakar bumbu madu', 'products/ayambakar.jpg', 30000, 35],
            ['Jus Alpukat', 'Jus alpukat kental', 'products/jusalpukat.jpg', 15000, 100],
        ];

        foreach ($items as [$name,$desc,$img,$price,$stock]) {
            Product::updateOrCreate(
                ['name' => $name],
                ['description'=>$desc,'image'=>$img,'price'=>$price,'stock'=>$stock,'is_active'=>true]
            );
        }

        // Tambah beberapa dummy
        for ($i=1; $i<=10; $i++) {
            Product::firstOrCreate(
                ['name' => 'Menu '.$i],
                [
                    'description' => 'Deskripsi menu '.$i,
                    'image' => 'products/menu'.$i.'.jpg',
                    'price' => rand(10000,45000),
                    'stock' => rand(10,100),
                    'is_active' => true
                ]
            );
        }
    }
}

<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Coupon;

class CouponSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Coupon::updateOrCreate(
            ['code' => 'HEMAT10'],
            ['type'=>'percent','value'=>10,'valid_form'=>now()->subDay(),'valid_until'=>now()->addMonth(),'max_uses'=>100,'uses'=>0]
        );

        Coupon::updateOrCreate(
            ['code' => 'POTONG5000'],
            ['type'=>'amount','value'=>5000,'valid_form'=>now()->subDay(),'valid_until'=>now()->addMonth(),'max_uses'=>200,'uses'=>0]
        );
    }
}

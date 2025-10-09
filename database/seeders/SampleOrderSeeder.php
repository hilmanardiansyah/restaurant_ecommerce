<?php

namespace Database\Seeders;

use App\Models\{User, Cart, CartItem, Product, Order, OrderItem, Payment, Coupon};
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class SampleOrderSeeder extends Seeder
{
    public function run(): void
    {
        $user = User::where('email','demo@example.com')->first();
        if (!$user) return;

        $cart = $user->cart ?: Cart::create(['user_id' => $user->id]);

        // Bersihkan cart
        $cart->items()->delete();

        // Ambil 3 produk
        $products = Product::inRandomOrder()->take(3)->get();
        foreach ($products as $p) {
            CartItem::create([
                'cart_id'   => $cart->id,
                'product_id'=> $p->id,
                'quantity'  => rand(1,3),
                'price'     => $p->price,
            ]);
        }

        $subtotal = $cart->items->sum('line_total');
        $coupon   = Coupon::where('code','HEMAT10')->first();
        $discount = $coupon && $coupon->isValid() ? round($subtotal * 0.10, 2) : 0;
        $shipping = 10000; // contoh ongkir flat
        $total    = $subtotal - $discount + $shipping;

        $order = Order::create([
            'user_id' => $user->id,
            'code'    => 'ORD-'.Str::upper(Str::random(8)),
            'subtotal'=> $subtotal,
            'discount'=> $discount,
            'shipping_cost'=> $shipping,
            'total'   => $total,
            'status'  => Order::STATUS_PENDING,
            'coupon_id' => $discount > 0 ? $coupon?->id : null,
            'customer_name'  => $user->name,
            'customer_phone' => '08123456789',
            'customer_email' => $user->email,
            'shipping_address' => 'Jl. Contoh No. 1, Cimahi'
        ]);

        foreach ($cart->items as $ci) {
            OrderItem::create([
                'order_id'     => $order->id,
                'product_id'   => $ci->product_id,
                'product_name' => $ci->product->name,
                'price'        => $ci->price,
                'quantity'     => $ci->quantity,
                'line_total'   => $ci->line_total,
            ]);
        }

        // Contoh payment pending
        Payment::create([
            'order_id' => $order->id,
            'provider' => 'midtrans',
            'channel'  => 'qris',
            'external_id' => 'MID-'.Str::upper(Str::random(10)),
            'transaction_status' => 'pending',
            'amount' => $order->total,
            'payload' => ['note' => 'Sample payment (dummy)'],
        ]);
    }
}

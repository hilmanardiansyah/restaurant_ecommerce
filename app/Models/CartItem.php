<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CartItem extends Model
{
    use HasFactory;

    protected $fillable = [
        'cart_id',
        'product_id',
        'quantity',
        'price',
        'line_total',
    ];

    protected $casts = [
    'price' => 'decimal:2',
    'line_total' => 'decimal:2',
    ];

    protected static function booted()
    {
        static::saving(callback: function (CartItem $item) {
            $item->line_total = (float)$item->price * (int)$item->quantity;
        });
    }

    public function cart ()
    {
        return $this->belongsTo(Cart::class);
    }

    public function product()
    {
        return $this->belongsTo(Product::class);
    } 
}

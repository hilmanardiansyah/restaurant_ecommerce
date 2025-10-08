<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Chef extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'product_id',
        'product_name',
        'facebook_link',
        'twitter_link',
        'instagram_link'
    ];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}

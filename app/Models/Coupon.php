<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Coupon extends Model
{
    use HasFactory;

    protected $fillable = [
        'code',
        'type',
        'value',
        'valid_form',
        'valid_until',
        'max_uses',
        'uses'
    ];

    protected $casts = [
        'valid_form' => 'datetime',
        'valid_until' => 'datetime',
        'value' => 'decimal:2',
    ];

    public function orders()
    {
        return $this->hasMany(Order::class);
    }
    public function isValid()
    {
        $now = now();
        if($this->valid_form && $now->lt($this->valid_form)) return false;
        if($this->valid_until && $now->gt($this->valid_until)) return false;
        if($this->max_uses && $this->uses >= $this->max_uses) return false;
        return true;
    }

}

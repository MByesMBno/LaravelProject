<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
class order_item extends Model
{
    use HasFactory;

    protected $fillable = [
        'order_id',
        'product_id',
        'product_type',
        'quantity',
        'price',
    ];

    public function order()
    {
        return $this->belongsTo(order::class);
    }

    public function product()
    {
        return $this->morphTo();
    }
}

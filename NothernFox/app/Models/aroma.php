<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
class aroma extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'tastes',
        'description',
        'price',
        'quantity',
    ];

    public function orderItems()
    {
        return $this->morphMany(order_item::class, 'product');
    }
}

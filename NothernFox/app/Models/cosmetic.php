<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
class cosmetic extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'tastes',
        'description',
        'price',
        'quantity',
    ];
}

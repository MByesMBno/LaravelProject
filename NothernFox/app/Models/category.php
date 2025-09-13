<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class category extends Model
{
    protected $fillable = ['id','name', 'description'];
    public function items():HasMany{
        return $this->hasMany(Item::class);
    }
    public function images(): HasMany
    {
        return $this->hasMany(categories_image::class, 'category_id');
    }
}

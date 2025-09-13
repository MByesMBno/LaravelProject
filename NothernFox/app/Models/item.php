<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
class item extends Model
{
    public $timestamps = false;
    protected $fillable = ['id','name','tastes','description', 'price', 'quantity','category_id'];
    public function category() : BelongsTo {
        return $this->belongsTo(Category::class);
    }
    public function order(): BelongsToMany{
        return $this->belongsToMany(Order::class, 'order_items');
    }
    public function images(): HasMany
    {
        return $this->hasMany(items_image::class, 'item_id');
    }
}

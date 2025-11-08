<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
class categories_image extends Model
{
    public $timestamps = false;
    protected $table = 'categories_images';

    protected $fillable = [
        'category_id',
        'url',
    ];

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class, 'category_id');
    }
}

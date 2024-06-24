<?php

namespace App\Models;

use App\Traits\Uuids;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Item extends Model
{
    use Uuids;
    protected $fillable = [
        'name',
        'slug',
        'description',
        'price',
    ];

    public function category() :BelongsToMany
    {
        return $this->belongsToMany(Category::class, "item_category");
    }
}

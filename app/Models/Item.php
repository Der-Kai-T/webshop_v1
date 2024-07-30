<?php

namespace App\Models;

use App\Traits\Uuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Item extends Model
{
    use Uuids;
    use HasFactory;
    protected $fillable = [
        'name',
        'description',
        'price',
    ];

    protected $with = ["categories", "sizes", "variants"];


    public function categories() :BelongsToMany
    {
        return $this->belongsToMany(Category::class, "item_categories");
    }

    public function sizes () :HasMany
    {
        return $this->hasMany(ItemSize::class);
    }

    public function variants() :HasMany
    {
        return $this->hasMany(ItemVariant::class);
    }

    public function images() :HasMany
    {
        return $this->hasMany(ItemImage::class);
    }
}

<?php

namespace App\Models;

use App\Traits\Uuids;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Category extends Model
{
    use Uuids;
    protected $fillable = [
        'name',
        'parent_id',
    ];

    protected function casts()
    {
        return [
            'parent_id' => 'string',
        ];
    }

    public function parent() : BelongsTo{
        return $this->belongsTo(Category::class);
    }

    public function item() :BelongsToMany
    {
        return  $this->belongsToMany(Category::class, "item_category");
    }
}

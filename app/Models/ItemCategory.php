<?php

namespace App\Models;

use App\Traits\Uuids;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ItemCategory extends Model
{
    use Uuids;
    protected $fillable = [
        'item_id',
        'category_id',
    ];

    protected function casts()
    {
        return [
            'item_id' => 'string',
            'category_id' => 'string',
        ];
    }


}

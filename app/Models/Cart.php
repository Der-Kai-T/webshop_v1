<?php

namespace App\Models;

use App\Traits\Uuids;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Cart extends Model
{
    use Uuids;
    protected $fillable = [
        'user_id',
        'item_id',
        'variant_id',
        'item_size_id',
        'price',
        'quantity',
    ];

    protected $with = ["item"];

    protected function casts()
    {
        return [
            'user_id' => 'string',
            'item_id' => 'string',
            'variant_id' => 'string',
            'item_size_id' => 'string',
        ];
    }

    public function item() :BelongsTo
    {
        return $this->belongsTo(Item::class, 'item_id', 'id');
    }
}

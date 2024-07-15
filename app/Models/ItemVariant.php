<?php

namespace App\Models;

use App\Traits\Uuids;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ItemVariant extends Model
{
    use Uuids;
    protected $fillable = [
        'item_id',
        'variant_id',
        'price_set',
        'price_add',
        'price_factor',
    ];

    protected function casts()
    {
        return [
            'item_id' => 'string',
            'variant_id' => 'string',
        ];
    }

    public function item() : BelongsTo
    {
        return $this->belongsTo(Item::class);
    }
}

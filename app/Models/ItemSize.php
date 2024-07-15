<?php

namespace App\Models;

use App\Traits\Uuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ItemSize extends Model
{
    use Uuids;
    use HasFactory;
    protected $fillable = [
        'item_id',
        'size',
        'price_set',
        'price_add',
        'price_factor',
    ];

    protected function casts()
    {
        return [
            'item_id' => 'string',
        ];
    }

    public function item () :BelongsTo
    {
        return $this->belongsTo(Item::class);
    }
}

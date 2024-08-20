<?php

namespace App\Models;

use App\Traits\Uuids;
use Illuminate\Database\Eloquent\Model;

class UserHistoryItem extends Model
{
    use Uuids;
    protected $fillable = [
        'history_id',
        'item_id',
        'variant_id',
        'item_size_id',
        'price',
        'quantity',
    ];

    protected function casts()
    {
        return [
            'history_id' => 'string',
            'item_id' => 'string',
            'variant_id' => 'string',
            'item_size_id' => 'string',
        ];
    }
}

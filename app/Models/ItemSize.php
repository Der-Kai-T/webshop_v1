<?php

namespace App\Models;

use App\Traits\Uuids;
use Illuminate\Database\Eloquent\Model;

class ItemSize extends Model
{
    use Uuids;
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
}

<?php

namespace App\Models;

use App\Traits\CartHelper;
use App\Traits\Uuids;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class UserHistoryItem extends Model
{
    use Uuids;
    use CartHelper;
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

    public function item() :BelongsTo
    {
        return $this->belongsTo(Item::class, 'item_id', 'id');
    }

    public function size(): BelongsTo
    {
        return $this->belongsTo(ItemSize::class, 'item_size_id', 'id');
    }

    public function item_name()
    {
        return $this->item->name . " (Größe " . $this->size->size .")";
    }

    public function price_()
    {
        return $this->format_price($this->price);
    }

    public function sum_(){
        return $this->format_price($this->price * $this->quantity);
    }

    public function history() : BelongsTo
    {
        return $this->belongsTo(UserHistory::class, 'history_id', 'id');
    }

}

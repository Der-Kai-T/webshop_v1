<?php

namespace App\Models;

use App\Traits\Uuids;
use Illuminate\Database\Eloquent\Model;

class ItemImage extends Model
{
    use Uuids;
    protected $fillable = [
        'item_id',
        'original_file_name',
        'file_name',
        'alt',
        'sort'
    ];

    public $path = "/uploads/items/";
    protected function casts()
    {
        return [
            'item_id' => 'string',
        ];
    }

    public function item(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Item::class);
    }

    public function src()
    {
        return "storage" . $this->path . $this->file_name;
    }
    public function thumb()
    {
        return "storage".$this->path . "thumb_" . $this->file_name;
    }


}

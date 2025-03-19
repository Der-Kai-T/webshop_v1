<?php

namespace App\Models;

use App\Traits\Uuids;
use Illuminate\Database\Eloquent\Model;

class HistoryStatus extends Model
{
    use Uuids;
    protected $fillable = [
        'name',
        'next_name',
        'sort',
        'show_in_group',
    ];

    protected $casts = [
        'show_in_group' => 'boolean',
    ];
}

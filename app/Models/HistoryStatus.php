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
    ];
}

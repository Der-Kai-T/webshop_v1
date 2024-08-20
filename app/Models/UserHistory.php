<?php

namespace App\Models;

use App\Traits\Uuids;
use Illuminate\Database\Eloquent\Model;

class UserHistory extends Model
{
    use Uuids;
    protected $fillable = [
        'user_id',
        'add',
        'subtract',
    ];

    protected function casts()
    {
        return [
            'user_id' => 'string',
        ];
    }
}

<?php

namespace App\Models;

use App\Traits\Uuids;
use Illuminate\Database\Eloquent\Model;

class TeamUser extends Model
{
    use Uuids;
    protected $fillable = [
        'team_id',
        'user_id',
    ];

    protected function casts()
    {
        return [
            'team_id' => 'string',
            'user_id' => 'string',
        ];
    }
}

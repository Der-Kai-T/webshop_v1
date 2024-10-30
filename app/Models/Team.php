<?php

namespace App\Models;

use App\Traits\Uuids;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Team extends Model
{
    use Uuids;
    protected $fillable = [
        'name',
    ];

    public function user() : BelongsToMany
    {
        return $this->belongsToMany(User::class, "team_users");
    }
}

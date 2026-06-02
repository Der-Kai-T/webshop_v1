<?php

namespace App\Models;

use App\Traits\Uuids;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class UserHistory extends Model
{
    use Uuids;
    protected $fillable = [
        'user_id',
        'add',
        'subtract',
        'manual',
        'status_id',
        'number'
    ];

    protected function casts()
    {
        return [
            'user_id' => 'string',
        ];
    }


    public function value() :Attribute
    {
        return new Attribute(
            get: function() {
                return $this->add - $this->subtract;
            }
        );
    }

    public function valueFormatted() :Attribute
    {
        return new Attribute(
            get: function() {
                $value = $this->add - $this->subtract;

                return number_format($value, 2, ",", ".");
            }
        );
    }
    public function user() :BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function status() :BelongsTo
    {
        return $this->belongsTo(HistoryStatus::class, 'status_id');
    }

    public function items() :HasMany
    {
        return $this->hasMany(UserHistoryItem::class, 'history_id');
    }
}

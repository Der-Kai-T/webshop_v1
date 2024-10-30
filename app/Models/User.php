<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use App\Traits\CartHelper;
use App\Traits\Uuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Fortify\TwoFactorAuthenticatable;
use Laravel\Jetstream\HasProfilePhoto;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Database\Eloquent\Casts\Attribute;

class User extends Authenticatable
{
    use HasApiTokens;
    use HasFactory;
    use HasProfilePhoto;
    use Notifiable;
    use TwoFactorAuthenticatable;
    use HasRoles;
    use Uuids;
    use CartHelper;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name_first',
        'name_last',
        'employee_number',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
        'two_factor_recovery_codes',
        'two_factor_secret',
    ];

    /**
     * The accessors to append to the model's array form.
     *
     * @var array<int, string>
     */
    protected $appends = [
        'profile_photo_url',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    public function name() : Attribute
    {
        return Attribute::make(
           get: fn () => $this->name_first . ' ' . $this->name_last,
        );
    }
    public function cart(){
        return \App\Models\Cart::where("user_id", $this->id)->get();

    }

    public function cart_count(){
        $count = 0;
        foreach($this->cart() as $item)
        {
            $count += $item->quantity;
        }
        return $count;
    }

    public function team() :BelongsToMany
    {
        return $this->belongsToMany(Team::class, 'team_users');
    }

    public function history() :HasMany
    {
        return  $this->hasMany(UserHistory::class);
    }

    public function budget()
    {
        $budget = 0;

        foreach($this->history()->get() as $history){
            $budget += $history->add ?? 0;
            $budget -= $history->subtract ?? 0;
        }
        if($budget == 0){
            return false;
        }
        return $budget;
    }

    public function budget_(){
        return $this->format_price($this->budget());
    }
}






















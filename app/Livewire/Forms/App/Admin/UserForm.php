<?php

namespace App\Livewire\Forms\App\Admin;

use App\Models\HistoryStatus;
use App\Models\User;
use App\Models\UserHistory;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Livewire\Attributes\Validate;
use Livewire\Form;

class UserForm extends Form
{
    #[Validate(['required'])]
    public $name_first = '';

    #[Validate(['required'])]
    public $name_last = '';

    #[Validate(['required'])]
    public $employee_number = '';

    #[Validate(['required', 'email', 'max:254'])]
    public $email = '';

    #[Validate(['nullable', 'date'])]
    public $email_verified_at = '';

    #[Validate(['required'])]
    public $password = '';

    #[Validate(['nullable', 'integer'])]
    public $current_team_id = '';

    #[Validate(['nullable'])]
    public $profile_photo_path = '';

    #[Validate(['nullable'])]
    public $two_factor_secret = '';

    #[Validate(['nullable'])]
    public $two_factor_recovery_codes = '';

    #[Validate(['nullable', 'date'])]
    public $two_factor_confirmed_at = '';


    public $name = '';

    public ?User $user = null;

    public $team_ids = [];
    public $role_names = [];

    public $value= 0;
    public bool $negative = false;

    public function mount(?User $user = null)
    {
        $this->user = $user;
        if(is_null($user)) {
            $this->reset();
        }else{
            $this->fill($user);
            $this->team_ids = $user->team->pluck('id')->toArray();
            $this->role_names = $user->roles->pluck("name")->toArray();
        }
    }

    public function validationRules(): array
    {
        return [
            "name_first" => "required|string",
            "name_last" => "required|string",
            "employee_number" => "required|string",
            "email" => "required|email",
        ];
    }
    public function create(){
        $data =$this->validate($this->validationRules());
        $password = Hash::make(Str::password());
        return User::create(array_merge($data, ["password" => $password]));
    }

    public function update(){
        $data =$this->validate($this->validationRules());
        return $this->user->update($data);
    }
    public function teamsAndRoles()
    {
        if(is_null($this->user))
            return false;

        $this->user->team()->sync($this->team_ids);

        $this->user->syncRoles($this->role_names);


        return true;
    }

    public function newOrder()
    {
        $this->validate([
           "value" => "required|integer|min:0",
           "negative" => "nullable|boolean",
        ]);

        $status = HistoryStatus::where("name", "created")->first();
        if(is_null($status))
            return false;

        if($this->negative){
            $add = 0;
            $subtract =  $this->value;
        }else{
            $add = $this->value;
            $subtract = 0;
        }

        return UserHistory::create([
            "user_id" => $this->user->id,
            "status_id" => $status->id,
            "add" => $add,
            "subtract" => $subtract,
            "manual" => true,
            "number" => Str::random()
        ]);
    }
    public function delete(){
        if(is_null($this->user))
            return false;

        $this->user->delete();
        $this->mount();
        return true;
    }
}

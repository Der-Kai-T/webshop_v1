<?php

namespace App\Livewire\Forms\App\Admin;

use App\Models\User;
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

    #[Validate(['required'])]
    public $name = '';

    public ?User $user = null;

    public $team_ids = [];
    public $role_names = [];

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

    public function teamsAndRoles()
    {
        if(is_null($this->user))
            return false;

        $this->user->team()->sync($this->team_ids);

        $this->user->syncRoles($this->role_names);


        return true;
    }
    public function delete(){
        if(is_null($this->user))
            return false;

        $this->user->delete();
        $this->mount();
        return true;
    }
}

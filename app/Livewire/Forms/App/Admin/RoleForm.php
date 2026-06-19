<?php

namespace App\Livewire\Forms\App\Admin;

use App\Models\Role;
use Livewire\Attributes\Validate;
use Livewire\Form;

class RoleForm extends Form
{
    #[Validate(['nullable', 'integer'])]
    public $team_id = null;

    #[Validate(['required'])]
    public $name = '';

    #[Validate(['required'])]
    public $guard_name = 'web';

    public ?Role $role = null;

    public $permissionNames = [];

    public function mount(?Role $role = null) {
        $this->role = $role;
        if(is_null($this->role)) {
            $this->reset();
        }else{
            $this->fill($this->role);
            $this->permissionNames = $this->role->permissions->pluck('name')->toArray();
        }
    }

    public function create()
    {
        $this->validate();
        $role = Role::create($this->except("role", "permissionNames"));
        $this->mount($role);
        return true;
    }

    public function update()
    {
        $this->validate();
        return $this->role->update($this->except("role", "permissionNames"));
    }

    public function delete(): true
    {
        $this->role->delete();
        $this->mount();
        return true;
    }

    public function syncPermissions()
    {
        $this->role->syncPermissions($this->permissionNames);
        return true;
    }
}

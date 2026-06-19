<?php

namespace App\Livewire\App\Admin;

use App\Livewire\Forms\App\Admin\RoleForm;
use App\Models\Permission;
use App\Models\Role;
use App\Traits\BootstrapTrait;
use App\Traits\PermissionTrait;
use App\Traits\ToastTrait;
use Livewire\Component;

class Roles extends Component
{

    use BootstrapTrait;
    use ToastTrait;
    use PermissionTrait;

    public $roles = [];

    public $permissions = [];

    public RoleForm $form;

    public function mount()
    {
        $this->check_permission("admin.role.index");
        $this->roles = Role::all()->sortBy('name');
        $this->permissions = Permission::all()->sortBy('name');
    }

    protected function formResult(bool $success = true, string $message = ""): void
    {
        if($success)
            $this->successToast($message);
        else
            $this->errorToast($message);


        $this->roles = Role::all()->sortBy('name');
    }

    public function selectRole($roleId)
    {
        $role = Role::find($roleId);
        if (is_null($role)) {
            $this->notFoundToast();
            return;
        }

        $this->form->mount($role);

    }

    public function formReset(): void
    {
        $this->form->mount();
    }

    public function formSubmit(): void
    {
        if (is_null($this->form->role)) {
            if ($this->form->create())
                $this->formResult(true, "Rolle angelegt");
            else
                $this->formResult(false);
        }else{
            if($this->form->update())
                $this->formResult(true, "Rolle aktualisiert");
            else
                $this->formResult(false);
        }
    }

    public function syncPermissions()
    {
        if($this->form->syncPermissions())
            $this->formResult(true, "gespeichert");
        else
            $this->formResult(false);
    }

    public function delete(){
        if($this->form->delete())
            $this->formResult(true, "gespeichert");
    }

    public function render()
    {
        return view('livewire.app.admin.roles')
            ->layout('layouts.admin', [
                "title" => "Rollen"
            ]);
    }
}

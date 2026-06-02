<?php

namespace App\Livewire\App\Admin;

use App\Livewire\Forms\App\Admin\UserForm;
use App\Models\User;
use App\Traits\BootstrapTrait;
use App\Traits\PermissionTrait;
use App\Traits\ToastTrait;
use Livewire\Component;

class Users extends Component
{
    use PermissionTrait;
    use BootstrapTrait;
    use ToastTrait;

    public $users = [];
    public $teams = [];
    public $roles = [];
    public UserForm $form;
    public function mount()
    {
        $this->loadData();
    }

    public function loadData()
    {
        $this->resetErrorBag();
        $this->users = \App\Models\User::all()->sortBy("name_last");
        $this->teams = \App\Models\Team::all()->sortBy("name");
        $this->roles = \App\Models\Role::all()->sortBy("name");
    }

    public function editUser($userId)
    {
        $user = User::find($userId);
        if(is_null($user)){
            $this->notFoundToast();
            return;
        }

        $this->form->mount($user);
    }

    public function updateTeamsAndRoles()
    {
        if($this->form->teamsAndRoles()) {
            $this->successToast();
            $this->loadData();
        }
    }



    public function formAbort()
    {
        $this->form->mount();
        $this->loadData();

    }

    public function deleteUser(){
        $this->check_permission("admin.user.delete");
        if($this->form->delete()) {
            $this->successToast();
            $this->loadData();

        }
        else {
            $this->errorToast();
        }
    }
    public function render()
    {
        return view('livewire.app.admin.users')
            ->layout('layouts.admin', [
                "title" => "Benutzerverwaltung"
            ]);
    }
}

<?php

namespace App\Livewire\App\Admin;

use App\Livewire\Forms\App\Admin\TeamForm;
use App\Models\Team;
use App\Models\User;
use App\Traits\BootstrapTrait;
use App\Traits\PermissionTrait;
use App\Traits\ToastTrait;
use Livewire\Component;

class Teams extends Component
{
    use BootstrapTrait;
    use ToastTrait;
    use PermissionTrait;

    public TeamForm $form;
    public $teams = [];

    public $users = [];
    public function mount()
    {
        $this->check_permission("admin.teams");
        $this->loadData();
    }
    public function loadData()
    {
        $this->teams = Team::all()->sortBy("name");
        $this->users = User::all()->sortBy("name_last");

    }

    public function selectTeam($id)
    {
        $team = Team::find($id);
        if (is_null($team)) {
            $this->notFoundToast();
            return;
        }

        $this->form->mount($team);
    }

    public function formSubmit()
    {
        if (is_null($this->form->team)) {
            if ($this->form->create()) {
                $this->successToast();
                $this->loadData();
            } else {
                $this->errorToast();
            }
        } else {
            if ($this->form->update()) {
                $this->successToast();
                $this->loadData();
            } else {
                $this->errorToast();
            }
        }
    }

    public  function updateUser()
    {
        if($this->form->users()){
            $this->successToast();
            $this->loadData();
        }
    }

    public function deleteTeam(){
        if($this->form->deleteTeam()){
            $this->successToast();
            $this->loadData();
            $this->form->mount();
            $this->dismissModal("deleteTeamModal");
        }
    }

    public function resetForm()
    {
        $this->form->mount();
    }

    public function render()
    {
        return view('livewire.app.admin.teams')
            ->layout('layouts.admin', [
                "title" => "Teams"
            ]);
    }
}

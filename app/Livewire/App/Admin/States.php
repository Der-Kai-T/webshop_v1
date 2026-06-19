<?php

namespace App\Livewire\App\Admin;

use App\Livewire\Forms\App\Admin\StateForm;
use App\Models\HistoryStatus;
use App\Traits\BootstrapTrait;
use App\Traits\PermissionTrait;
use App\Traits\ToastTrait;
use Livewire\Component;

class States extends Component
{
    use BootstrapTrait;
    use PermissionTrait;
    use ToastTrait;

    public $states = [];

    public StateForm $form;

    public function mount(): void
    {
        $this->check_permission("admin.states");
        $this->loadData();
    }

    public function loadData() :void
    {
        $this->states = HistoryStatus::all()->sortBy("sort");
    }
    public function selectState($stateId): void
    {
        $state = HistoryStatus::find($stateId);
        if (is_null($state))
            $this->notFoundToast();
        else
            $this->form->mount($state);

    }

    public function formReset(): void
    {
        $this->form->mount();
    }

    public function formSubmit(): void
    {
        if (is_null($this->form->history_status)) {
            if ($this->form->create())
                $this->successToast();
            else
                $this->errorToast();
        }else{
            if($this->form->update())
                $this->successToast();
            else
                $this->errorToast();
        }

        $this->loadData();
    }

    public function render()
    {
        return view('livewire.app.admin.states')
            ->layout("layouts.admin", [
                "title" => "Status",
            ]);
    }
}

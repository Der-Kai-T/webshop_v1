<?php

namespace App\Livewire\Forms\App\Admin;

use App\Models\HistoryStatus;
use Livewire\Attributes\Validate;
use Livewire\Form;

class StateForm extends Form
{
    #[Validate(['required'])]
    public $name = '';

    #[Validate(['nullable'])]
    public $next_name = '';

    #[Validate(['required', 'integer'])]
    public $sort = 0;

    #[Validate(['boolean'])]
    public $show_in_group = false;

    public ?HistoryStatus $history_status = null;

    public function mount(?HistoryStatus $history_status = null)
    {
        $this->history_status = $history_status;
        if(is_null($this->history_status)) {
            $this->reset();
        }else{
            $this->fill($this->history_status);
        }
        $this->resetErrorBag();
    }

    public function create()
    {
        $this->validate();
        return HistoryStatus::create($this->except("history_status"));
    }

    public function update()
    {
        $this->validate();
        return $this->history_status->update($this->except("history_status"));
    }
}

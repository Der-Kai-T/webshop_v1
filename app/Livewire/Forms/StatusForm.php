<?php

namespace App\Livewire\Forms;

use App\Models\HistoryStatus;
use Livewire\Attributes\Validate;
use Livewire\Form;

class StatusForm extends Form
{
    #[Validate(['required'])]
    public $name = '';

    #[Validate(['nullable'])]
    public $next_name = '';

    #[Validate(['required', 'integer'])]
    public $sort = '';

    #[Validate(['boolean'])]
    public $show_in_group = '';

    public $status;

    public function loadStatus(HistoryStatus $status){
        $this->status = $status;
        $this->name = $status->name;
        $this->next_name = $status->next_name;
        $this->show_in_group = $status->show_in_group;
        $this->sort = $status->sort;
    }
}

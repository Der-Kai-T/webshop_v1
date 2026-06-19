<?php

namespace App\Livewire\Forms\App\Admin;

use App\Models\UserHistory;
use Livewire\Attributes\Validate;
use Livewire\Form;

class UserHistoryForm extends Form
{
    #[Validate(['required'])]
    public $user_id = '';

    #[Validate(['nullable', 'decimal:2'])]
    public $add = '';

    #[Validate(['nullable', 'decimal:2'])]
    public $subtract = '';

    #[Validate(['boolean'])]
    public $manual = '';

    #[Validate(['nullable'])]
    public $status_id = '';

    #[Validate(['required'])]
    public $number = '';

    public ?UserHistory $history = null;

    public function mount(?UserHistory $history = null)
    {
        $this->history = $history;
        if(is_null($this->history)){
            $this->reset();
        }else{
            $this->fill($history);
        }
    }

    public function updateState(){
        if(!is_null($this->history)){
            $data = $this->validate([
                "status_id" => ["required", "exists:history_statuses,id"]
            ]);
            return $this->history->update($data);
        }
        return false;
    }
}

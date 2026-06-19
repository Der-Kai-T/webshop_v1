<?php

namespace App\Livewire\Forms\App\Admin;

use App\Models\Item;
use Livewire\Attributes\Validate;
use Livewire\Form;

class ItemForm extends Form
{
    #[Validate(['required'])]
    public $name = '';

    #[Validate(['nullable'])]
    public $description = '';

    #[Validate(['required', 'numeric'])]
    public $price = '';

    public ?Item $item = null;

    public function mount(?Item $item = null)
    {
        $this->item = $item;
        if(is_null($this->item)){
            $this->reset();
        }else{
            $this->fill($this->item);
        }

        $this->resetErrorBag();
    }

    public function update(){
        if(is_null($this->item))
            return false;
        $data = $this->validate();
        return $this->item->update($data);
    }
}

<?php

namespace App\Livewire\App\Admin;

use App\Models\Item;
use App\Traits\BootstrapTrait;
use App\Traits\PermissionTrait;
use App\Traits\ToastTrait;
use Livewire\Component;

class Items extends Component
{

    use BootstrapTrait;
    use ToastTrait;
    use PermissionTrait;

    public $items = [];

    public function mount(): void
    {
        $this->check_permission("admin.item");
        $this->loadData();
    }

    public function loadData(): void
    {
        $this->items = Item::all()->sortBy("name");
    }
    public function render()
    {
        return view('livewire.app.admin.items')
            ->layout('layouts.admin', [
                "title" => "Artikel"
            ]);
    }
}

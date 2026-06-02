<?php

namespace App\Livewire\App\Admin;

use App\Models\UserHistory;
use Livewire\Component;

class Orders extends Component
{
    public $orders = [];

    public function mount()
    {
        $this->orders = UserHistory::all()->sortByDesc('created_at');
    }
    public function render()
    {
        return view('livewire.app.admin.orders')
            ->layout('layouts.admin', ['title' => "Bestellübersicht"]);
    }
}

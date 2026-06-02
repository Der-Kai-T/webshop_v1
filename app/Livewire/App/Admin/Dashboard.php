<?php

namespace App\Livewire\App\Admin;

use App\Models\HistoryStatus;
use App\Models\User;
use App\Models\UserHistory;
use Livewire\Component;

class Dashboard extends Component
{

    public User $user;
    public HistoryStatus $orderIsNew;

    public $ordersToConfirm = [];

    public function mount()
    {
        $this->user = auth()->user();
        $this->orderIsNew = HistoryStatus::where("name", "created")->first();
        $this->loadOrders();
    }

    public function loadOrders()
    {
        $this->ordersToConfirm = UserHistory::query()
            ->where('status_id', $this->orderIsNew->id)
            ->whereHas('user.team', function ($query) {
                $query->whereIn(
                    'teams.id',
                    $this->user->team->pluck('id')
                );
            })
            ->get();
    }
    public function render()
    {
        return view('livewire.app.admin.dashboard')
            ->layout('layouts.admin');
    }
}

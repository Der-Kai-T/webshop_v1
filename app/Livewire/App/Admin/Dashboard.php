<?php

namespace App\Livewire\App\Admin;

use App\Models\HistoryStatus;
use App\Models\User;
use App\Models\UserHistory;
use App\Traits\PermissionTrait;
use App\Traits\ToastTrait;
use Livewire\Component;

class Dashboard extends Component
{
    use PermissionTrait;
    use ToastTrait;

    public User $user;
    public HistoryStatus $orderIsNew;

    public $ordersToConfirm = [];

    public function mount()
    {
        $this->user = auth()->user();
        $this->orderIsNew = HistoryStatus::where("name", "created")->first();
        if (auth()->user()->can("admin.order.confirm"))
            $this->loadOrders();
    }

    public function loadOrders()
    {
        $this->ordersToConfirm = UserHistory::query()
            ->where('status_id', $this->orderIsNew->id)
            ->where("manual", false)
            ->whereHas('user.team', function ($query) {
                $query->whereIn(
                    'teams.id',
                    $this->user->team->pluck('id')
                );
            })
            ->get();
    }

    public function confirmOrder($orderId)
    {
        $this->check_permission("admin.order.confirm");
        $order = UserHistory::find($orderId);
        $confirmed = HistoryStatus::where("name", "confirmed")->first();
        $order->status_id = $confirmed->id;
        $order->save();
        $this->loadOrders();
        $this->successToast();

    }

    public function render()
    {
        return view('livewire.app.admin.dashboard')
            ->layout('layouts.admin');
    }
}

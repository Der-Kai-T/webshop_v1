<?php

namespace App\Livewire\App\Order;

use App\Livewire\CustomComponent;
use App\Models\HistoryStatus;
use App\Models\UserHistory;
use Masmerise\Toaster\Toaster;


class Status extends CustomComponent
{
    public UserHistory $order;

    public $statusId;

    public $allStatus;

    public function mount(UserHistory $order){
        $this->order = $order;
        $this->statusId = $order->status_id;

        $this->allStatus = HistoryStatus::all()->sortBy("name");
    }
    public function render()
    {

        return view('livewire.app.order.status', [
            'order' => $this->order,
            'allStatus' => $this->allStatus
        ]);
    }

    public function update(){
        $this->check_permission("admin.order.edit");
        $this->order->status_id = $this->statusId;
        $this->order->save();

        Toaster::success("Status has been updated");

    }
}

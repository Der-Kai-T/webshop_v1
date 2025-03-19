<?php

namespace App\Livewire\App\Order;

use App\Livewire\CustomComponent;
use App\Models\UserHistoryItem;

use Masmerise\Toaster\Toaster;

class Details extends CustomComponent
{

    public $order;
    public $item;

    public function mount($order){
        $this->order = $order;
    }
    public function render()
    {
        return view('livewire.app.order.details', [
            'order' => $this->order,
        ]);
    }

    public function delete(UserHistoryItem $item){
        $this->check_permission("admin.order.edit");
        $this->item = $item;
        $item_name = $this->item->quantity . "x " . $this->item->item_name();

        //delete order, then calculate new order price
        $this->item->delete();

        $new_sum = 0;
        foreach ($this->order->items as $item){
            $new_sum += $item->quantity * $item->price;
        }
        $this->order->subtract = $new_sum;
        $this->order->save();

        Toaster::success($item_name . " ".__("deleted"));
    }
}

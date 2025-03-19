<?php

namespace App\Livewire\App\Order;


use App\Livewire\CustomComponent;
use App\Models\UserHistoryItem;
use Masmerise\Toaster\Toaster;


class DeleteElement extends CustomComponent
{
    public UserHistoryItem $item;

    public function mount(UserHistoryItem $item){
        $this->item = $item;
    }
    public function render()
    {
        return view('livewire.app.order.delete-element', [
            "item" => $this->item,
        ]);
    }

    public function delete(){
//        $this->check_permission("admin.order.edit");
//        $order = $this->item->history;
//        $item_name = $this->item->quantity . "x " . $this->item->item_name();
//        //delete order, then calculate new order price
//        $this->item->delete();
//
//        $new_sum = 0;
//        foreach ($order->items as $item){
//            $new_sum += $item->quantity * $item->price;
//        }
//        $order->subtract = $new_sum;
//        $order->save();
//
//        Toaster::info($item_name . __("deleted"));
    }
}

<?php

namespace App\Livewire\App\Order;

use App\Livewire\CustomComponent;
use App\Models\UserHistory;
use App\Models\UserHistoryItem;

use App\Traits\BootstrapTrait;
use App\Traits\ToastTrait;
use Masmerise\Toaster\Toaster;

class Details extends CustomComponent
{
    use BootstrapTrait;
    use ToastTrait;
    public UserHistory $order;
    public ?UserHistoryItem $itemToDelete = null;

    public function mount($order){
        $this->order = $order;
    }
    public function render()
    {
        return view('livewire.app.order.details', [
            'order' => $this->order,
        ]);
    }

    public function prepareDelete($itemId)
    {
        $this->successToast();
        $this->itemToDelete = UserHistoryItem::find($itemId);

        if(is_null($this->itemToDelete)){
            $this->notFoundToast();
        }else{
            $this->dispatchModal("deleteItem");
        }
    }
    public function abortDelete()
    {
        $this->itemToDelete = null;
        $this->dismissModal("deleteItem");
    }

    public function confirmDelete()
    {
        $this->check_permission("admin.order.edit");
        $this->itemToDelete->delete();

        $new_sum = 0;
        foreach($this->order->items as $item){
            $new_sum += $item->price * $item->quantity;
        }
        $this->order->subtract = $new_sum;
        $this->order->save();

        $this->successToast("Eintrag gelöscht");
    }

}

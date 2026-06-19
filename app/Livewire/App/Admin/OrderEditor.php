<?php

namespace App\Livewire\App\Admin;

use App\Livewire\CustomComponent;
use App\Livewire\Forms\App\Admin\UserHistoryForm;
use App\Models\HistoryStatus;
use App\Models\UserHistory;
use App\Traits\ToastTrait;
use Livewire\Component;

class OrderEditor extends CustomComponent
{
    use ToastTrait;
    public UserHistory $order;

    public $status = [];

    public UserHistoryForm $form;
    public function mount(UserHistory $order)
    {
        $this->order = $order;
        $this->form->mount($this->order);
        $this->status = HistoryStatus::all()->sortBy('sort');
    }

    public function updateState()
    {
        if($this->form->updateState())
            $this->successToast();
        else
            $this->errorToast();
    }

    public function deleteOrder()
    {
        $this->check_permission('admin.order.delete');
        $this->order->items()->delete();
        $this->order->delete();
        $this->successToast();
        return redirect()->route('admin.orders');
    }
    public function render()
    {
        return view('livewire.app.admin.order-editor')
            ->layout('layouts.admin', [
                'title' => 'Bestellung bearbeiten'
            ]);
    }
}

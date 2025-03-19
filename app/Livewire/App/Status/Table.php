<?php

namespace App\Livewire\App\Status;

use App\Livewire\CustomComponent;
use App\Livewire\Forms\StatusForm;
use App\Models\HistoryStatus;
use Masmerise\Toaster\Toaster;


class Table extends CustomComponent
{
    public $status;

    public StatusForm $form;



    public function mount() :void{
        $this->status = HistoryStatus::all();
    }
    public function render()
    {
        return view('livewire.app.status.table',[
            "status" => $this->status
        ]);
    }

    public function save():void
    {

        $data = [
            "name" => $this->form->name,
            "sort" => $this->form->sort,
            "next_name" => $this->form->next_name,
            "show_in_group" => $this->form->show_in_group ?? false,
        ];
        if(is_null($this->form->status)){
            $this->check_permission("admin.status.create");
            HistoryStatus::create($data);
            Toaster::success("Status created successfully");
        }else{
            $this->check_permission("admin.status.update");
            $this->form->status->update($data);
            Toaster::success("Status updated successfully");
        }


        $this->status = HistoryStatus::all();
    }

    public function new(){
        $this->check_permission("admin.status.create");
        $this->form->status = null;
    }
    public function edit(HistoryStatus $status):void
    {
        $this->check_permission("admin.status.update");
        $this->form->loadStatus($status);
    }
}

<?php

namespace App\Livewire\App\Admin;

use App\Models\User;
use Livewire\Component;

class CheckPermissions extends Component
{
    public User $user;

    public function mount(){
        $this->user = auth()->user();
    }
    public function render()
    {
        return view('livewire.app.admin.check-permissions')
            ->layout('layouts.admin');

    }
}

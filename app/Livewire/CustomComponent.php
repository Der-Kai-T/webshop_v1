<?php

namespace App\Livewire;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Livewire\Component;

class CustomComponent extends Component
{
    protected function check_permission(String $permission){
        if(isset($this->permission)){
            $permission =  $this->permission . ".". $permission;
        }

        if(auth()->user()->can($permission)){
            return true;
        }else{
            abort(403);
        }
    }
}

<?php

namespace App\Traits;

trait PermissionTrait
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

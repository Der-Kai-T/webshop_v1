<?php

namespace App\Livewire;

use App\Traits\PermissionTrait;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Livewire\Component;

class CustomComponent extends Component
{
use PermissionTrait;
}

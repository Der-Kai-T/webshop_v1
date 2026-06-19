<?php

use App\Models\Permission;
use App\Models\User;
use Livewire\Component;

new class extends Component {

    public $availablePermissions = [];
    public User $user;

    public function mount()
    {
        $this->availablePermissions = Permission::all()->sortBy("name");
        $this->user  = auth()->user();
    }
};
?>

<div>
    <div>
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        Berechtigungen
                    </div>
                    <div class="card-body">
                        <table class="table">
                            <thead>
                            <tr>
                                <th>Berechtigung</th>
                                <th>Erteilt?</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($availablePermissions as $p)
                                <tr>
                                    <th> {{ $p->name }}</th>
                                    <th>
                                        <x-app.helper.boolean :value="$user->can($p)"/>
                                    </th>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>

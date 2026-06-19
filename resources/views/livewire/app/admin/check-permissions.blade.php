<div>
    <x-slot name="header">
        <h1>Hallo {{ $user->name }}</h1>
    </x-slot>



    <div class="row">
        <div class="col-6">
            <livewire:app.admin.helper.permissions/>
        </div>
    </div>
</div>

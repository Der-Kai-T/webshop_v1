<div>
    <x-slot name="header">
        <h1>Hallo {{ $user->name }}</h1>
    </x-slot>


    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    Bestellungen zur Freigabe
                </div>
                <div class="card-body">
                    <table class="table">
                        <thead>
                        <tr>
                            <th>Team</th>
                            <th>Mitarbeiter</th>
                            <th>Bestellung</th>
                            <th>Aktionen</th>
                        </tr>
                        </thead>
                        <tbody>

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>


        <div class="row">
            <div class="col-6">
                <livewire:app.admin.helper.permissions />
            </div>
        </div>

</div>

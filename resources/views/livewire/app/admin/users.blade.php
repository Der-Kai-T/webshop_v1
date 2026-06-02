<div>
    <x-slot name="header">
        <h1>Benutzerverwaltung</h1>
    </x-slot>

    <div class="row">
        <div class="col-6">
            <div class="card">
                <div class="card-header">
                    Benutzerliste
                </div>
                <div class="card-body p-0 card-body-scroll" id="user-scroll-container">
                    <table class="table table-striped table-sm table-bordered table-hover table-sticky">
                        <thead>
                        <tr>
                            <th>Benutzer</th>
                            <th>Team(s)</th>
                            <th class="text-end">Budget</th>
                        </tr>
                        </thead>

                        <tbody>
                        @foreach($users as $user)
                            <tr wire:click="editUser('{{ $user->id }}')">
                                <td>
                                    {{ $user->name_last }}, {{ $user->name_first }}
                                </td>
                                <td>
                                    <ul>
                                        @foreach($user->team as $team)
                                            <li> {{ $team->name }}</li>
                                        @endforeach
                                    </ul>
                                </td>
                                <td class="text-end">
                                    @if($user->budget() > 0)
                                        <span class="value_positive">
                                            {{ number_format($user->budget(), 2, ",",".") }} &euro;
                                        </span>
                                    @else
                                        <span class="value_negative">
                                            {{ number_format($user->budget(), 2, ",",".") }} &euro;
                                        </span>
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <div class="col-6">
            <div class="card">
                <form wire:submit="formSubmit">
                    <div class="card-header">
                        @if(is_null($form->user))
                            Benutzer anlegen
                        @else
                            Benutzer {{ $form->user->name_first }} {{ $form->user->name_last }} bearbeiten
                            <div class="card-tools">
                                <button class="btn btn-sm btn-warning"
                                        type="button"
                                        data-bs-toggle="modal"
                                        data-bs-target="#userDelete"
                                >
                                    <span class="fas fa-trash"></span>
                                </button>
                            </div>
                        @endif
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-6">
                                <x-app.form.input model="name_first"/>
                            </div>
                            <div class="col-6">
                                <x-app.form.input model="name_last"/>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-4">
                                <x-app.form.input model="employee_number"/>
                            </div>
                            <div class="col-8">
                                <x-app.form.input model="email" type="email"/>
                            </div>
                        </div>


                    </div>
                    <div class="card-footer">
                        <x-admin.form.submit/>
                        <button class="btn btn-secondary"
                                type="button"
                                wire:click="formAbort">
                            <span class="fas fa-times"></span>
                            {{ __("abort") }}
                        </button>
                    </div>
                </form>
            </div>
            @if(!is_null($form->user))

                <div class="card mt-2">
                    <div class="card-header">
                        Bestell-Historie
                    </div>
                    <div class="card-body p-0">
                        <table class="table">
                            <thead>
                            <tr>
                                <th>Datum</th>
                                <th>Bestell-Nummer</th>
                                <th class="text-end">+/-</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($form->user->history->sortByDesc("created_at") as $order)
                                <tr>
                                    <td>
                                        {{ $order->created_at->format("d.m.y H:i") }}
                                    </td>
                                    <td>
                                        <a href="{{ route("admin.order.edit", $order->id) }}"
                                           wire:navigate.hover>
                                            {{ $order->number }}
                                        </a>

                                    </td>
                                    <td>
                                        @if($order->value > 0)
                                            <span class="value_positive">
                                            {{ $order->value_formatted }} &euro;
                                            </span>
                                        @else
                                            <span class="value_negative">
                                                {{ $order->value_formatted  }} &euro;
                                            </span>
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>

                <div class="card mt-2">
                    <form wire:submit="updateTeamsAndRoles">
                        <div class="card-header">
                            Teams & Rollen
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-6">
                                    <x-app.form.select
                                        multiple
                                        optional
                                        model="team_ids"
                                        :data="$teams"
                                    />
                                </div>
                                <div class="col-6">
                                    <x-app.form.select
                                        multiple
                                        optional
                                        model="role_names"
                                        value="name"
                                        :data="$roles"
                                    />
                                </div>
                            </div>



                        </div>
                        <div class="card-footer">
                            <x-admin.form.submit/>
                        </div>
                    </form>
                </div>


            @endif
        </div>
        <x-app.helper.modal-confirm-delete
            id="userDelete"
            title="Benutzer löschen bestätigen"
            delete-function="deleteUser">
            Bitte bestätigen Sie, dass Sie den Benutzer löschen möchten. Dieser Vorgang kann nicht rückgängig gemacht
            werden.
            Alle Bestellungen des Nutzers werden ebenfalls gelöscht.
        </x-app.helper.modal-confirm-delete>
    </div>
</div>

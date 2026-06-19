<div>
    <x-slot name="header">
        <h1>Teams</h1>
    </x-slot>


    <div class="row">
        <div class="col-8">
            <div class="card">
                <div class="card-header">
                    Teams
                </div>
                <div class="card-body p-0 card-body-scroll" id="user-scroll-container">
                    <table class="table table-striped table-sm table-bordered table-hover table-sticky">
                        <thead>
                        <tr>
                            <th>Team</th>
                            <th>Benutzer</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($teams as $team)
                            <tr
                                wire:click="selectTeam('{{ $team->id }}')">
                                <td> {{ $team->name }}</td>
                                <td>
                                    <ul>
                                        @foreach($team->user->sortBy("name_last") as $user)
                                            <li>{{ $user->name_last }}, {{ $user->name_first }}</li>
                                        @endforeach
                                    </ul>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>

                </div>
            </div>
        </div>
        <div class="col-4">
            <form wire:submit="formSubmit">
                <div class="card">
                    <div class="card-header">
                        @if(is_null($this->form->team))
                            neues Team anlegen
                        @else
                            Team {{ $this->form->team->name }} bearbeiten

                            <div class="card-tools">
                                <button type="button"
                                        class="btn btn-warning"
                                        data-bs-toggle="modal"
                                        data-bs-target="#deleteTeamModal">
                                    <span class="fas fa-trash"></span>
                                </button>
                            </div>
                        @endif
                    </div>
                    <div class="card-body">
                        <x-app.admin.form.input model="name"/>
                    </div>
                    <div class="card-footer">
                        <x-admin.form.submit/>
                        <button type="button"
                                class="btn btn-secondary"
                                wire:click="resetForm"
                        >
                            <span class="fas fa-times-circle"></span>
                            Abbrechen
                        </button>
                    </div>
                </div>
            </form>

            @if(!is_null($this->form->team))
                <form wire:submit="updateUser">
                    <div class="card">
                        <div class="card-header">
                            Benutzer im Team
                        </div>
                        <div class="card-body">
                            <x-app.form.select
                                multiple
                                optional
                                model="userIds"
                                :data="$users"
                            />
                        </div>
                        <div class="card-footer">
                            <x-admin.form.submit/>
                        </div>
                    </div>
                </form>

                <x-app.helper.modal-confirm-delete
                id="deleteTeamModal"
                delete-function="deleteTeam">
                    Sind Sie sicher, dass Sie dieses Team löschen möchten?
                </x-app.helper.modal-confirm-delete>
            @endif
        </div>
    </div>
</div>

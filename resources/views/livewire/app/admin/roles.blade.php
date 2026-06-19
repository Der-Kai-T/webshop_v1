<div>
    <x-slot name="header">
        <h1>Rollen</h1>
    </x-slot>

    <div class="row">
        <div class="col-6">
            <div class="card">
                <div class="card-header">
                    Liste aller Rollen
                </div>
                <div class="card-body p-0 card-body-scroll" id="user-scroll-container">
                    <table class="table table-striped table-sm table-bordered table-hover table-sticky">
                        <thead>
                        <tr>
                            <th>Rolle</th>
                            <th>Berechtigungen</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($roles as $role)
                            <tr wire:click="selectRole('{{ $role->id }}')">
                                <td>
                                    {{ $role->name }}
                                </td>
                                <td>
                                    <ul>
                                        @foreach($role->permissions as $permission)
                                            <li>{{ $permission->name }}</li>
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
        <div class="col-6">
            <form wire:submit="formSubmit">
                <div class="card">
                    <div class="card-header">
                        @if(is_null($form->role))
                            Rolle anlegen
                        @else
                            Rolle bearbeiten
                            <div class="card-tools">
                                <button
                                    type="button"
                                    class="btn btn-warning btn-sm"
                                    data-bs-target="#confirmDeleteModal"
                                    data-bs-toggle="modal"
                                    >
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
                                wire:click="formReset"
                        >
                            <span class="fas fa-times-circle"></span>
                            {{ __("abort") }}
                        </button>
                    </div>
                </div>
            </form>
            <x-app.helper.modal-confirm-delete
                id="confirmDeleteModal"
                delete-function="delete">
                Bitte bestätigen Sie, dass Sie diese Rolle löschen möchten.
            </x-app.helper.modal-confirm-delete>

            @if(!is_null($form->role))
                <div class="card mt-4">
                    <form wire:submit="syncPermissions">
                        <div class="card-header">
                            Berechtigungen
                        </div>
                        <div class="card-body">
                            <x-app.admin.form.select
                                model="permissionNames"
                                :data="$permissions"
                                value="name"
                                multiple
                                optional/>
                        </div>
                        <div class="card-footer">
                            <x-admin.form.submit/>
                            <button type="button"
                                    class="btn btn-secondary"
                                    wire:click="formReset"
                            >
                                <span class="fas fa-times-circle"></span>
                                {{ __("abort") }}
                            </button>
                        </div>
                    </form>
                </div>
            @endif
        </div>
    </div>
</div>

<div>
    <x-slot name="header">
        <h1>Status</h1>
    </x-slot>

    <div class="row">
        <div class="col-6">
            <div class="card">
                <div class="card-header">
                    Übersicht
                </div>
                <div class="card-body p-0 card-body-scroll" id="user-scroll-container">
                    <table class="table table-striped table-sm table-bordered table-hover table-sticky">
                        <thead>
                        <tr>
                            <th>Status (database)</th>
                            <th>Status (Translated)</th>
                            <th></th>

                        </tr>
                        </thead>
                        <tbody>
                        @foreach($states as $state)
                            <tr wire:click="selectState('{{ $state->id }}')">
                                <td>{{ $state->name }}</td>
                                <td>
                                    {{ __($state->name) }}
                                </td>
                                <td>{{ $state->sort }}</td>
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
                        @if(is_null($form->history_status))
                            Status anlegen
                        @else
                            Status bearbeiten
                        @endif
                    </div>
                    <div class="card-body">
                        <x-app.admin.form.input model="name"/>
                        <x-app.admin.form.input model="next_name" optional/>
                        <x-app.admin.form.input model="sort"/>
                        <x-app.admin.form.checkbox model="show_in_group" optional/>
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
        </div>
    </div>
</div>

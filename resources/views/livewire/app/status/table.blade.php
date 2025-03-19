<div>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#newStatusModal" wire:click="new()">
                        <span class="fas fa-check-circle mr-2"></span> {{  __('create') }}
                    </button>

                </div>
                <div class="card-body">
                    <table class="table table-striped">
                        <thead>
                        <tr>
                            <th>Sortierung</th>
                            <th>Status</th>

                            <th>Nächster Status</th>
                            <th>Bestellungen in Gruppierung anzeigen</th>
                            <th></th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($status->sortBy("sort") as $s)
                            <tr>
                                <td>{{ $s->sort }}</td>
                                <td>{{ $s->name }} // Translated: {{ __($s->name) }}</td>

                                <td>{{ $s->next_name }}</td>
                                <td>
                                    <x-boolean :value="$s->show_in_group"/>
                                </td>
                                <td><button class="btn btn-sm btn-primary" wire:click="edit('{{$s->id}}')" data-toggle="modal" data-target="#newStatusModal"><span class="fas fa-edit"></span></button></td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <div>
        <div wire:ignore.self class="modal fade" id="newStatusModal" tabindex="-1" role="dialog" aria-labelledby="newStatusCenterTitle"
             aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <form>
                        <div class="modal-header">
                            <h5 class="modal-title" id="newStatusLongTitle">neuen Status anlegen</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <x-app.helper.form.input-text model="name" />

                            <x-app.helper.form.input-text model="sort" type="number"/>
                            <x-app.helper.form.input-text model="next_name" />
                            <x-app.helper.form.checkbox model="show_in_group" optional/>

                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="button" class="btn btn-primary" wire:click="save()" data-dismiss="modal">Save changes</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

</div>

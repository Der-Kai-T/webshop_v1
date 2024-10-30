@extends("adminlte::page")


@section("content_header")
    <h1>Benutzer {{ $user->name }}</h1>
@endsection


@section("content")
    <div class="row">
        <div class="col-12">
            <div class="card">
                <form action="/admin/user/{{$user->id}}/history_create" method="POST">
                    @csrf

                    <div class="card-header">
                        <h3 class="card-title">Buchung anlegen</h3>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-6">
                                <x-admin.form.input
                                    name="add"
                                    label="Guthaben erhöhen"
                                    type="number"
                                    step="0.01"
                                />
                            </div>
                            <div class="col-6">
                                <x-admin.form.input
                                    name="subtract"
                                    label="Guthaben reduzieren"
                                    type="number"
                                    step="0.01"
                                />
                            </div>
                        </div>

                    </div>
                    <div class="card-footer">
                        <x-admin.form.submit/>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

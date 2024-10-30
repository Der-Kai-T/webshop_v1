@extends("adminlte::page")
<?php
if (!isset($user)) {
    $user = new \App\Models\User();
    $h3 = "neuen Benutzer anlegen";
    $action = "/admin/user";
    $patch = false;

} else {
    $h3 = "Stammdaten anpassen";
    $action = "/admin/user/$user->id";
    $patch = true;
}

?>


@section("content_header")
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Benutzer {{ $user->name }}</h1>
            </div>
            <div class="col-sm-6">
                @if($user->budget() != 0)
                    <div class="float-right rounded p-2
                        @if($user->budget() < 0)
                            bg-gradient-danger
                        @else
                            bg-gradient-info
                        @endif

                    ">
                        Budget:
                        {!! config("app.shop.currency_symbol") !!}
                        {{ $user->budget_() }}
                    </div>
                @endif
            </div>
        </div>
    </div>

@endsection




@section("content")
    <div class="row">
        <div class="col-12">
            <div class="card">
                <form action="{{$action}}" method="POST">
                    @csrf
                    @if($patch)
                        @method('PATCH')
                    @endif

                    <div class="card-header">
                        <h3 class="card-title">{{$h3}}</h3>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-6">
                                <x-admin.form.input
                                        name="name_first"
                                        label="Vorname"
                                        value="{{$user->name_first}}"
                                        required
                                />
                            </div>
                            <div class="col-6">
                                <x-admin.form.input
                                        name="name_last"
                                        label="Nachname"
                                        value="{{$user->name_last}}"
                                        required
                                />
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-6">
                                <x-admin.form.input
                                        name="employee_number"
                                        label="Mitarbeiter-Nummer"
                                        value="{{$user->employee_number}}"
                                        required
                                />
                            </div>
                            <div class="col-6">
                                <x-admin.form.input
                                        name="email"
                                        label="E-Mail"
                                        type="email"
                                        value="{{$user->email}}"
                                        required
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

    @if($patch)
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Buchungen</h3>
                        <div class="card-tools">
                            <x-admin.card.button href="/admin/user/{{$user->id}}/history_create"
                                                 label="Buchung anlegen"/>
                        </div>
                    </div>
                    <div class="card-body">
                        <table class="table table-striped datatable">
                            <thead>
                            <tr>
                                <th>Zeitpunkt</th>
                                <th>Plus</th>
                                <th>Minus</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($user->history as $history)
                                <tr>
                                    <td>
                                        <span style="display: none">{{ $history->created_at }}</span>
                                        {{ $history->created_at->format(config("app.time_format")) }}
                                    </td>
                                    <td>
                                        {!! config("app.shop.currency_symbol") !!} {{ $history->add ??  "0.00" }}
                                    </td>
                                    <td>
                                        {!! config("app.shop.currency_symbol") !!} {{ $history->subtract ?? "0.00" }}
                                    </td>
                                </tr>
                            @endforeach

                            </tbody>
                        </table>

                    </div>
                    <div class="card-footer">

                    </div>
                </div>
            </div>
        </div>









            <?php
            $references = $user->roles;
            $all = \App\Models\Role::all();
            ?>
        <x-admin.twolists
                :references="$references"
                :all="$all"
                key="name"
                sort-by="name"
                value="name"
                action="/admin/user/{{$user->id}}/role"
                label="Rollen"
        />



            <?php
            $references = $user->team;
            $all = \App\Models\Team::all();
            ?>
        <x-admin.twolists
                :references="$references"
                :all="$all"
                key="id"
                sort-by="name"
                value="name"
                action="/admin/user/{{$user->id}}/team"
                label="Teams"
        />
    @endif
@endsection

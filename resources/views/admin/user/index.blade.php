@extends("adminlte::page")

@section("content_header")
    <h1>Benutzer</h1>
@endsection

@section("content")
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Benutzerliste</h3>
                    <div class="card-tools">
                        <x-admin.card.button href="/admin/user/create" />
                    </div>
                </div>
                <div class="card-body">
                    <table class="table table-striped datatable">
                        <thead>
                        <tr>
                            <th>Benutzer</th>
                            <th>Budget</th>
                            <th></th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($user as $u)
                            <tr>
                                <td>{{ $u->name_last }}, {{ $u->name_first }}</td>
                                <td>
                                    <span class="
                                    @if($u->budget() < 0)
                                    text-red
                                    @endif
                                    ">
                                    {!! config("app.shop.currency_symbol") !!} {{ $u->budget_() }}</span>

                                </td>
                                <td><x-admin.edit-link href="/admin/user/{{$u->id}}/edit" /></td>
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
@endsection

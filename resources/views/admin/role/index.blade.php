@extends("adminlte::page")

@section("content_header")
    <h1>Rollen</h1>
@endsection


@section("content")

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Liste</h3>
                    <div class="card-tools">
                        <x-admin.card.button href="/admin/role/create" />
                    </div>
                </div>
                <div class="card-body">
                    <table class="table table-striped datatable">
                        <thead>
                        <tr>
                            <th>Rolle</th>
                            <th>Berechtigungen</th>
                            <th></th>
                        </tr>
                        </thead>
                        <tbody>
                    @foreach($roles as $role)
                    <tr>
                        <td>{{ $role->name }}</td>
                        <td>
                            <ul>
                                @foreach($role->getPermissionNames() as $perm)
                                    <li>{{ $perm }}</li>
                                @endforeach
                            </ul>

                        </td>
                        <td><x-admin.edit-link href="/admin/role/{{$role->id}}/edit" /></td>
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

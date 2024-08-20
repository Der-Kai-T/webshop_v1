@extends("adminlte::page")

@section("content_header")
    <h1>Teams</h1>
@endsection

@section("content")
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Team</h3>
                    <div class="card-tools">
                        <x-admin.card.button href="/admin/team/create" />
                    </div>
                </div>
                <div class="card-body">
                    <table class="table table-striped datatable">
                        <thead>
                        <tr>
                            <th>Team</th>
                            <th>Benutzer</th>
                            <th></th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($teams as $team)
                            <tr>
                                <td>{{ $team->name }}</td>
                                <td>
                                    <ul>
                                    @foreach($team->user->sortBy("name_last") as $user)
                                        <li>{{$user->name}}</li>
                                        @endforeach
                                    </ul>
                                </td>
                                <td><x-admin.edit-link href="/admin/team/{{$team->id}}/edit" /></td>
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

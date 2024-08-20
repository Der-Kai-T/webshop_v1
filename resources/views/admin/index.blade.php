@extends("adminlte::page")


@section("content_header")
    <h1>Hallo {{ auth()->user()->name }}</h1>
@endsection

@section("content")

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">zugewiesene Rollen</h3>
                </div>
                <div class="card-body">
                    <ul>
                        @foreach(auth()->user()->roles as $role)
                            <li>
                                {{$role->name}}
                                <ul>
                                    @foreach($role->permissions->sortBy("name") as $permission)
                                        <li> {{ $permission->name }}</li>
                                    @endforeach
                                </ul>
                            </li>
                        @endforeach
                    </ul>
                </div>

            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">effektive Rechte</h3>
                </div>
                <div class="card-body">
                    <table class="table table-striped">
                        <thead>
                        <tr>
                            <th>Berechtigung</th>
                            <th>Zugriff</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach(\App\Models\Permission::all()->sortBy("name") as $permission)
                            <tr>
                                <td>
                                    {{ $permission->name }}
                                </td>

                                @can($permission->name)
                                    <td class="bg-gradient-green"><span class="fas fa-check"></span></td>
                                @endcan
                                @cannot($permission->name)
                                    <td class="bg-gradient-red"><span class="fas fa-times"></span></td>
                                @endcannot

                            </tr>

                        @endforeach


                        </tbody>

                    </table>
                </div>

            </div>
        </div>
    </div>
@endsection

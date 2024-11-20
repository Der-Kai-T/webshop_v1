@extends("adminlte::page")


@section("content_header")
    <h1>Hallo {{ auth()->user()->name }}</h1>
@endsection

@section("content")

    @can("admin.order.confirm")
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Bestellungen</h3>
                    </div>
                    <div class="card-body">
                        <table class="table table-striped datatable">
                            <thead>
                            <tr>
                                <th>Team</th>
                                <th>Mitarbeiter</th>
                                <th>Bestellung</th>
                                <th></th>
                            </tr>
                            </thead>

                            <tbody>
                            @foreach(auth()->user()->team as $team)
                                @foreach($team->user as $user)
                                        <?php
                                        $status_new = \App\Models\HistoryStatus::where("name", "created")->first()->id;
                                        $orders = \App\Models\UserHistory::where("user_id", $user->id)
                                            ->where("status_id", $status_new)
                                            ->get();
                                        ?>
                                    @foreach($orders as $order)
                                        <tr>
                                            <td>{{ $team->name }}</td>
                                            <td>{{ $user->name }}</td>
                                            <td>
                                                Bestelldatum: {{ $order->created_at->format("d.m.Y H:i") }}
                                                Bestellnummer: {{ $order->number }}
                                                <ul>
                                                    @foreach($order->items as $item)
                                                        <li>{{ $item->quantity }}x {{ $item->item_name() }}</li>
                                                    @endforeach
                                                </ul>


                                            </td>
                                            <td>
                                                <form action="/admin/order/{{ $order->id }}/confirm" method="POST">
                                                    @csrf
                                                    <button type="submit" class="btn btn-primary">Bestellung bestätigen</button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach

                                @endforeach
                            @endforeach
                            </tbody>
                        </table>

                    </div>
                    <div class="card-footer">

                    </div>
                </div>
            </div>
        </div>
    @endcan





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

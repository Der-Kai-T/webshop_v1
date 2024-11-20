@extends("adminlte::page")


@section("content_header")
    <h1>Bestellungen</h1>
    @endsection


@section("content")
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Bestellübersicht</h3>
                </div>
                <div class="card-body">
                    <table class="table table-striped" id="orders-datatable">
                        <thead>
                        <tr>
                            <th>Bestellnummer</th>
                            <th>Datum</th>
                            <th>Benutzer</th>
                            <th>Inhalt</th>
                            <th>+/-</th>
                            <th>Status</th>
                            <th></th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($order as $o)
                            <tr>
                                <td>{{ $o->number }}</td>
                                <td>
                                    <span style="display: none">{{ $o->created_at }}</span>
                                    {{ $o->created_at->format(config("app.time_format")) }}
                                </td>
                                <td>
                                    {{ $o->user->name }}
                                </td>
                                <td>
                                    @if(!is_null($o->items))
                                    <ul>
                                        @foreach($o->items as $item)
                                            <li>{{ $item->quantity }}x {{ $item->item_name() }}</li>
                                        @endforeach
                                    </ul>
                                         @endif
                                </td>
                                <td>
                                    @if(!is_null($o->add))
                                        <span class="text-green">
                                            +
                                            {{ $o->add }}
                                            {!! config("app.shop.currency_symbol") !!}
                                        </span>
                                    @endif


                                    @if(!is_null($o->subtract))
                                        <span class="text-red">
                                            -
                                            {{ $o->subtract }}
                                            {!! config("app.shop.currency_symbol") !!}
                                        </span>
                                    @endif


                                </td>
                                <td>
                                    @if(!is_null($o->status))
                                        {{ __($o->status->name) }}
                                    @endif
                                </td>
                                <td>
                                    <x-admin.edit-link href="/admin/order/{{$o->id}}/edit"/>
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
    @endsection

@extends("adminlte::page")


@section("content_header")
        <h1>Bestellung</h1>
    @endsection


@section("content")
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Bestell-Nummer {{ $order->number }}</h3>
                </div>
                <div class="card-body">
                    <table class="table table-striped datatable">
                        <thead>
                            <tr>
                                <th>Position</th>
                                <th>Menge</th>
                                <th>Einzelpreis</th>
                                <th>Gesamtpreis</th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach($order->items as $item)
                            <tr>
                                <td>{{ $item->item->name }}</td>
                                <td>{{ $item->quantity }}</td>
                                <td>{!!  config("app.shop.currency_symbol") !!} {{ $item->price_() }}</td>
                                <td>{!!  config("app.shop.currency_symbol") !!} {{ $item->sum_() }}</td>

                            </tr>
                        @endforeach
                        </tbody>

                    </table>
                </div>
                <div class="card-footer">
                    <div class="float-right">
                        @php($plus = number_format($order->add , 2,config("app.shop.decimal_separator"), config("app.shop.thousand_separator")))
                        @php($minus = number_format($order->subtract*-1 , 2,config("app.shop.decimal_separator"), config("app.shop.thousand_separator")))
                        Konto-Veränderung:

                        @if($order->add > 0)
                            <span class="text-success"> {{ $plus }} {!! config("app.shop.currency_symbol") !!} </span>
                        @endif

                        @if($order->subtract > 0)
                            <span class="text-danger"> {{ $minus }} {!! config("app.shop.currency_symbol") !!} </span>
                        @endif

                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Status ändern</h4>
                </div>
                <div class="card-body">
                <livewire:app.order.status :order="$order"/>
                </div>
            </div>
        </div>
    </div>



    <x-admin.delete_section
        name="Bestellung"
        action="/admin/order/{{$order->id}}"
    />
    @endsection

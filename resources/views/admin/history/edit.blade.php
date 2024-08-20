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
                    
                </div>
                <div class="card-footer">

                </div>
            </div>
        </div>
    </div>
    @endsection

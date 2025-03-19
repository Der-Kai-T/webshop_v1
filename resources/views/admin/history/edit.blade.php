@extends("adminlte::page")


@section("content_header")
        <h1>Bestellung</h1>
    @endsection


@section("content")



    <livewire:app.order.details :order="$order" />

{{--                    <livewire:order-details-table :order="$order"/>--}}



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

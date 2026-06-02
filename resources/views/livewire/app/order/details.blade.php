<div>
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
                            <tr
                            @if(!is_null($itemToDelete) && $itemToDelete->id == $item->id)
                                class="mark-delete-row"
                            @endif
                            >
                                <td>
                                    <button class="btn btn-warning btn-sm float-end"
                                            wire:click="prepareDelete('{{ $item->id }}')"
                                            ><span class="fas fa-trash"></span>
                                    </button>
                                    {{ $item->item->name }}
                                </td>
                                <td>{{ $item->quantity }}</td>
                                <td>{!!  config("app.shop.currency_symbol") !!} {{ $item->price_() }}</td>
                                <td>{!!  config("app.shop.currency_symbol") !!} {{ $item->sum_() }}</td>


                            </tr>
                        @endforeach
                        </tbody>

                    </table>
                </div>

                <div class="card-footer">
                    <div class="float-end">
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

    <x-app.helper.modal-confirm-delete
        id="deleteItem"
        title="Löschen bestätigen"
        delete-function="confirmDelete"
        abort-function="abortDelete"
        >
        Bitte bestätigen Sie den Löschvorgang
    </x-app.helper.modal-confirm-delete>
</div>

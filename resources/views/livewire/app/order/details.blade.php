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
                            <tr>
                                <td>
                                    <button class="btn btn-warning btn-sm" id="confirmButton_{{$item->id}}"
                                            onclick="toggle('{{ $item->id }}')"><span class="fas fa-trash"></span>
                                    </button>
                                    {{ $item->item->name }}
                                    <button wire:click="delete('{{ $item->id }}')" class="btn btn-danger btn-sm"
                                            style="display: none" id="deleteButton_{{$item->id}}"><span
                                            class="fas fa-trash-alt"></span></button>
                                </td>
                                <td>{{ $item->quantity }}</td>
                                <td>{!!  config("app.shop.currency_symbol") !!} {{ $item->price_() }}</td>
                                <td>{!!  config("app.shop.currency_symbol") !!} {{ $item->sum_() }}</td>


                            </tr>
                        @endforeach
                        </tbody>

                    </table>
                    <script>
                        function toggle(id) {
                            $('#confirmButton_' + id).toggle();
                            $('#deleteButton_' + id).toggle();
                        }
                    </script>
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
</div>

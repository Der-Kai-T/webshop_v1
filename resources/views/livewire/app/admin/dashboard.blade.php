<div>
    <x-slot name="header">
        <h1>Hallo {{ $user->name }}</h1>
    </x-slot>

    @can("admin.order.confirm")
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        Bestellungen zur Freigabe
                    </div>
                    <div class="card-body">
                        <table class="table">
                            <thead>
                            <tr>
                                <th>Mitarbeiter</th>
                                <th>Bestellung</th>
                                <th>Inhalt</th>
                                <th>Aktionen</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($ordersToConfirm as $order)
                                <tr>
                                    <td>{{ $order->user->name }}</td>
                                    <td>{{ $order->number }}</td>
                                    <td>
                                        @if(!is_null($order->items))
                                            <ul>
                                                @foreach($order->items as $item)
                                                    <li>{{ $item->quantity }}x {{ $item->item_name() }}</li>
                                                @endforeach
                                            </ul>
                                        @endif
                                    </td>
                                    <td>
                                        <button class="btn btn-primary"
                                                wire:click="confirmOrder('{{ $order->id }}')"
                                                >
                                            <span class="fas fa-check-circle"></span>
                                            Bestellung bestätigen
                                        </button>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    @endcan



</div>

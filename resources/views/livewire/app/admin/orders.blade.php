<div>
    <x-slot name="header">
        <h1>Bestellübersicht</h1>
    </x-slot>

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    Liste durchgeführter Bestellungen / Buchungen
                </div>
                <div class="card-body">
                    <table class="table table-striped">
                        <thead>
                        <tr>
                            <th>Datum</th>
                            <th>Bestell-Nummer</th>
                            <th>Benutzer</th>
                            <th>Inhalt</th>
                            <th class="text-end"> +/-</th>
                            <th>Status</th>
                            <th>Aktionen</th>
                        </tr>
                        </thead>
                        <tbody>

                        @foreach($orders as $order)

                            <tr>
                                <td>
                                    {{ $order->created_at->format("d.m.Y H:i") }}
                                </td>
                                <td>
                                    <a href="{{ route("admin.order.edit", $order->id) }}"
                                       wire:navigate.hover>
                                        {{ $order->number }}
                                    </a>

                                </td>
                                <td>
                                    {{ $order->user->name }}
                                </td>
                                <td>
                                    @if(!is_null($order->items))
                                        <ul>
                                            @foreach($order->items as $item)
                                                <li>{{ $item->quantity }}x {{ $item->item_name() }}</li>
                                            @endforeach
                                        </ul>
                                    @endif
                                </td>
                                <td class="text-end">
                                    @if($order->value > 0)
                                        <span class="value_positive">
                                            {{ $order->value_formatted }} &euro;
                                            </span>
                                    @else
                                        <span class="value_negative">
                                                {{ $order->value_formatted  }} &euro;
                                            </span>
                                    @endif
                                </td>
                                <td>
                                    {{ __($order->status->name) }}
                                </td>
                                <td>

                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>

                </div>
            </div>
        </div>
    </div>
</div>

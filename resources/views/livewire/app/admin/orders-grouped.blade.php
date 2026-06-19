<div>
    <x-slot name="header">
        <h1>Offene Bestellungen (gruppiert)</h1>
    </x-slot>


    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    Liste offener Bestellungen
                </div>
                <div class="card-body">
                    @foreach($items as $item)
                        @if(count($item['sizes']) == 0)
                            @continue
                        @endif
                        <h3 class="mt-4">{{ $item['name'] }}</h3>

                        <table class="table table-striped">
                            @foreach($item['sizes'] as $size)
                                <tr>
                                    <th style="width: 10%">{{ $size['size'] }}</th>
                                    <td>
                                        Summe: {{ $size['ordered_sum'] }}

                                        <table class="table table-sm table-striped">
                                            <thead>
                                            <tr>
                                                <th style="width:10%">Anz.</th>
                                                <th style="width:20%">Best.-Nr.</th>
                                                <th style="width:30%">Besteller</th>
                                                <th style="width:20%">Status</th>
                                                <th style="width:20%">Datum</th>
                                            </tr>
                                            </thead>

                                            <tbody>
                                            @foreach($size['ordered_details'] as $detail)
                                                <tr>
                                                    <td>{{ $detail['quantity'] }}</td>
                                                    <td><a href="{{ route("admin.order.edit", $detail['orderId']) }}">
                                                            {{ $detail['orderNr'] }}
                                                        </a></td>
                                                    <td>{{ $detail['name'] }}</td>
                                                    <td>{{ __($detail['status']) }}</td>
                                                    <td>{{ $detail['date'] }}</td>
                                                </tr>
                                            @endforeach
                                            </tbody>
                                        </table>

                                    </td>
                                </tr>
                            @endforeach
                        </table>

                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>

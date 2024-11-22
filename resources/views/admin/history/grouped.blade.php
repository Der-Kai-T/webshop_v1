@extends("adminlte::page")


@section("content_header")
    <h1>Bestellungen</h1>
@endsection


@section("content")
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Bestellübersicht Gruppiert nach Artikeln</h3>
                </div>
                <div class="card-body">
                    <table class="table table-striped" id="orders-datatable">
                        <thead>
                        <tr>
                            <th>Artikel</th>
                            <th>Bestellungen</th>
                            <th></th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($items as $i)
                            <tr>
                                <td>{{ $i->name }}</td>
                                <td>
                                    <table class="table table-striped table-sm">
                                        <tr>
                                            <th>Größe</th>
                                            <th>Menge</th>
                                        </tr>
                                        <tbody>
                                        @foreach($i->sizes->sortBy("size") as $s)
                                            @php
                                                $s->ordered_sum = 0;
                                                $ordered_details = array();
                                                $db = \App\Models\UserHistoryItem::where("item_id", "=", $i->id)
                                                    ->where("item_size_id", "=", $s->id)
                                                    ->get();
                                                foreach ($db as $d) {

                                                    if ($d->history->status->name == "created") {
                                                        $s->ordered_sum += $d->quantity;
                                                        $ordered_details[] = [
                                                            "quantity" => $d->quantity,
                                                            "name" => $d->history->user->name,
                                                            "status" => $d->history->status->name,
                                                            "date" => $d->history->created_at->format("d.m.Y H:i"),
                                                        ];
                                                    }
                                                }
                                                $s->ordered_details = $ordered_details;
                                            @endphp

                                            @if($s->ordered_sum > 0)
                                            <tr>
                                                <th>{{ $s->size }}</th>
                                                <td>
                                                    Summe: {{ $s->ordered_sum }}
                                                    <table class="table-sm table table-striped">
                                                        <thead>
                                                        <tr>
                                                            <th>Anz.</th>
                                                            <th>Besteller</th>
                                                            <th>Status</th>
                                                            <th>Datum</th>
                                                        </tr>
                                                        </thead>

                                                        @foreach($s->ordered_details as $od)
                                                        <tr>
                                                            <td>{{ $od['quantity'] }}</td>
                                                            <td>{{ $od['name'] }}</td>
                                                            <td>{{ $od['status'] }}</td>
                                                            <td>{{ $od['date'] }}</td>
                                                        </tr>
                                                        @endforeach





                                                    </table>

                                                </td>
                                            </tr>
                                            @endif
                                        @endforeach

                                        </tbody>
                                    </table>
                                </td>
                                <td>

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

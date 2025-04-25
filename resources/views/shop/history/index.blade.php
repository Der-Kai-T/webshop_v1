@extends("layouts.main")

@section("content")

    <!-- Category Top Banner -->
    <div
        class="py-6 bg-img-cover bg-dark bg-overlay-gradient-dark position-relative overflow-hidden mb-4 bg-pos-center-center"
        style="">
        <div class="container position-relative z-index-20" data-aos="fade-right" data-aos-delay="300">
            {{--        <nav aria-label="breadcrumb">--}}
            {{--            <ol class="breadcrumb">--}}
            {{--                <li class="breadcrumb-item breadcrumb-light"><a href="#">Home</a></li>--}}
            {{--                <li class="breadcrumb-item breadcrumb-light"><a href="#">Activities</a></li>--}}
            {{--                <li class="breadcrumb-item active breadcrumb-light" aria-current="page">Clothing</li>--}}
            {{--            </ol>--}}
            {{--        </nav>--}}
            <h1 class="fw-bold display-6 mb-4 text-white">Buchungshistorie</h1>
            <div class="col-12 col-md-6">
                <p class="lead text-white mb-0">
                    Übersicht über alle bisher getätigten Buchungen
                </p>
            </div>
        </div>
    </div>
    <!-- Category Top Banner -->

    <div class="container">

        <div class="row">
            <div class="col-md-4 offset-md-4">
                <div class="card"
                style="
                    border: 1px solid black;
                    border-radius: .5rem;
                    text-align: center;

                "
                >
                    <div class="card-header">
                        verfügbares Budget
                    </div>
                    <div class="card-body"
                    @if(auth()->user()->budget() < 0)
                        style="background-color: red"
                    @endif

                    >
                        {!! config("app.shop.currency_symbol") !!} {{ auth()->user()->budget() }}
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-12">

                <table class="table table-striped">
                    <thead>
                    <tr>
                        <th>Datum</th>
                        <th>Art</th>
                        <th>Artikel</th>

                        <th>Status</th>
                        <th style="text-align: right; padding-right: 1rem">Summe</th>

                    </tr>
                    </thead>
                    <tbody>
                    @foreach($history->sortBy("created_at") as $his)

                        <tr>
                            <td>
                                {{ $his->created_at->format(config("app.time_format")) }}
                            </td>
                            <td>
                                @if($his->manual == 1)
                                    Budget-Änderung
                                @else
                                    Bestellung
                                @endif

                            </td>
                            <td>
                                <ul>
                                    @foreach($his->items as $item)
                                        <li>{{ $item->quantity }}x {{ $item->item->name }} <span class="bg-info ml-1 px-1 small rounded-lg">{{ $item->size->size }}</span></li>
                                    @endforeach
                                </ul>
                            </td>
                            <td>
                                @if(!is_null($his->status_id))
                                    {{ __($his->status->name) }}
                                @endif
                            </td>

                            <td style="text-align: right; padding-right: 1rem">
                                @if(!is_null($his->add) && strlen($his->add)>1)
                                    <span style="color:#0a3622"> + {!! config("app.shop.currency_symbol") !!} {{ $his->add }}</span>
                                @endif
                                    @if(!is_null($his->subtract) && strlen($his->subtract)>1)
                                        <span style="color:#aa2222"> - {!! config("app.shop.currency_symbol") !!} {{ $his->subtract }}</span>
                                    @endif
                            </td>

                        </tr>
                    @endforeach

                    </tbody>
                </table>

            </div>
        </div>
    </div>

@endsection

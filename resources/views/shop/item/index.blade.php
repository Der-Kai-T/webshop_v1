@extends("layouts.main")


@section("content")
    <div class="container">

        <div class="row">
            <div class="col-12 col-lg-9">
                <div class="row g-4 mb-5">

                    @foreach($items as $item)
                        @if($item->categories->count() > 0)
                            <x-shop.category.product-card :item="$item"/>
                        @endif
                    @endforeach

                </div>
            </div>
        </div>
    </div>
@endsection

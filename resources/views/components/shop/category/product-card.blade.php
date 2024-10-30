<div class="col-12 col-sm-6 col-md-4">
    <!-- Card Product-->
    <div class="card position-relative h-100 card-listing hover-trigger">
        <div class="card-header">
            <picture class="position-relative overflow-hidden d-block bg-light">
                <img class="w-100 img-fluid position-relative z-index-10" title=""
                     src="{{ asset($item->main_image()->thumb())  }}"
                     alt="{{ $item->main_image()->alt }}">
            </picture>
            <picture class="position-absolute z-index-20 start-0 top-0 hover-show bg-light">
                <img class="w-100 img-fluid" title=""
                     src="{{ asset($item->main_image()->thumb())  }}"
                     alt="{{ $item->main_image()->alt }}">
            </picture>
            <div class="card-actions">
{{--                <span class="small text-uppercase tracking-wide fw-bolder text-center d-block">Direkt-Auswahl</span>--}}
{{--                <div class="d-flex justify-content-center align-items-center flex-wrap mt-3">--}}
{{--                    @foreach($item->sizes->sortBy("size") as $size)--}}
{{--                        <button class="btn btn-outline-dark btn-sm mx-2">{{ $size->size }}</button>--}}
{{--                    @endforeach--}}


{{--                </div>--}}
            </div>
        </div>
        <div class="card-body px-0 text-center">
            <div class="d-flex justify-content-center align-items-center mx-auto mb-1">
{{--                <x-shop.review-stars.small/>--}}
            </div>
            <a class="mb-0 mx-2 mx-md-4 fs-p link-cover text-decoration-none d-block text-center"
               href="/item/{{$item->id}}">{{ $item->name }}</a>
            <p class="fw-bolder m-0 mt-2">{{ $item->price }}</p>
        </div>
    </div>
    <!--/ Card Product-->
</div>

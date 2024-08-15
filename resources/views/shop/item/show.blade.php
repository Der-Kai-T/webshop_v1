@extends("layouts.main")


@section("content")
    <!-- Product Top-->
    <section class="container">

        <!-- Breadcrumbs-->
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item"><a href="#">Activities</a></li>
                <li class="breadcrumb-item active" aria-current="page">Clothing</li>
            </ol>
        </nav>            <!-- /Breadcrumbs-->

        <div class="row g-5">

            <!-- Images Section-->
            <div class="col-12 col-lg-7">
                <div class="row g-1">
                    <div class="swiper-container gallery-thumbs-vertical col-2 pb-4">
                        <div class="swiper-wrapper">

                            @foreach($item->images as $image)
                                <x-shop.item.image.thumbs
                                    src="{{asset($image->thumb())}}"
                                    alt="{{ $image->alt }}"
                                />
                            @endforeach


                        </div>
                    </div>
                    <div class="swiper-container gallery-top-vertical col-10">
                        <div class="swiper-wrapper">

                            @foreach($item->images as $image)
                                <x-shop.item.image.large
                                    src="{{asset($image->src())}}"
                                    alt="{{ $image->alt }}"
                                />
                            @endforeach


                        </div>
                    </div>
                </div>
            </div>
            <!-- /Images Section-->

            <!-- Product Info Section-->
            <div class="col-12 col-lg-5">
                <div class="pb-3">

                    <!-- Product Name, Review, Brand, Price-->
                    <div class="d-flex justify-content-between align-items-center mb-2">
                        <p class="small fw-bolder text-uppercase tracking-wider text-muted mb-0 lh-1"></p>
                        <div class="d-flex justify-content-start align-items-center">
                            <x-shop.review-stars.small
                                stars="4.5"
                                count="100"
                            />
                        </div>
                    </div>
                    <h1 class="mb-2 fs-2 fw-bold">{{ $item->name }}</h1>
                    <div class="d-flex justify-content-start align-items-center">
                        <p class="lead fw-bolder m-0 fs-3 lh-1 text-danger me-2">&euro; {{ $item->price }}</p>
                        {{--  <s class="lh-1 me-2"><span class="fw-bolder m-0">$94.99</span></s>--}}
                        {{--  <p class="lead fw-bolder m-0 fs-6 lh-1 text-success">Save $10.00</p>--}}
                    </div>
                    <!-- /Product Name, Review, Brand, Price-->

                    {{--   <x-shop.item.product-views count="123"/>--}}

                    <form action="/card/add" method="POST">
                        @csrf
                        <input type="hidden" name="item_id" value="{{$item->id}}">

                    <!-- Product Options-->
                    <div class="border-top mt-4 mb-3">
{{--                        <x-shop.item.options.color/>--}}
                        <div class="product-option-size">
                            <small class="text-uppercase d-block fw-bolder mb-2">
                                Größe (EU) : <span class="selected-option fw-bold" id="sizeLabel"></span>
                            </small>
                            <div class="form-group">
                                <select required name="selectSize" class="form-control" id="selectSize">
                                    <option value="">Bitte Größe wählen</option>
                                    @foreach($item->sizes->sortBy("size") as $size)
                                        <option value="{{$size->id}}">{{ $size->size }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                    <!-- /Product Options-->

                    <!-- Add To Cart-->
                    <div class="d-flex justify-content-between mt-3">
                        <button type="submit" class="btn btn-dark btn-dark-chunky flex-grow-1 me-2 text-white">zum Warenkorb hinzufügen</button>
                       <!-- <button class="btn btn-orange btn-orange-chunky"><i class="ri-heart-line"></i></button>-->
                    </div>
                    <!-- /Add To Cart-->
                    </form>
                    {{--<x-shop.item.socials/>--}}

                    {{--<x-shop.item.special-offers/>--}}

                </div>
            </div>
            <!-- / Product Info Section-->
        </div>
    </section>
    <!-- / Product Top-->

    <section>

        <!-- Product Tabs-->
        <div class="mt-7 pt-5 border-top">
            <div class="container">
                <!-- Tab Nav-->
                <ul class="nav justify-content-center nav-tabs nav-tabs-border mb-4" id="myTab" role="tablist">
                    <x-shop.item.tab-nav-item name="Details" href="details"/>

                </ul>
                <!-- / Tab Nav-->

                <!-- Tab Content-->
                <div class="tab-content" id="myTabContent">

                    <!-- Tab Details Content-->
                    <div class="tab-pane fade show active py-5" id="details" role="tabpanel"
                         aria-labelledby="details-tab">
                        <div class="col-12 col-lg-10 mx-auto">
                            <div class="row g-5">
                                <div class="col-12 col-md-6">
                                    <p>
                                        {{ $item->description }}
                                    </p>
                                </div>
                                {{--                                <div class="col-12 col-md-6">--}}
                                {{--                                    <ul>--}}
                                {{--                                        <li>Stretchy cotton-modal jersey stripe</li>--}}
                                {{--                                        <li>Garment washed</li>--}}
                                {{--                                        <li>Flat, covered elastic waistband</li>--}}
                                {{--                                        <li>58% pima cotton/38% viscose </li>--}}
                                {{--                                        <li>Modal/4% Lycra® elastane</li>--}}
                                {{--                                    </ul>--}}
                                {{--                                </div>--}}
                            </div>
                        </div>
                    </div>
                    <!-- Tab Details Content-->

                    {{--                    <x-shop.item.reviews/>--}}

                    {{--                    <x-shop.item.delivery/>--}}

                    {{--                    <x-shop.item.returns/>--}}

                </div>
                <!-- / Tab Content-->
            </div>
        </div>
        <!-- / Product Tabs-->

    </section>

    {{--    <x-shop.item.related-products/>--}}

@endsection

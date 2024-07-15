@extends("layouts.main")

@section("content")

    <x-shop.category.top-banner :category="$category"/>

    <div class="container">

        <div class="row">

            <x-shop.category.sidebar :category="$category"/>

            <!-- Category Products-->
            <div class="col-12 col-lg-9">

                <x-shop.category.top-toolbar/>

                <!-- Products-->
                <div class="row g-4 mb-5">

                    @foreach($items as $item)
                        <x-shop.category.product-card :item="$item"/>
                    @endforeach



                </div>
                <!-- / Products-->


               <x-shop.category.pagination/>

                <x-shop.category.related/>

            </div>
            <!-- / Category Products-->

        </div>
    </div>
@endsection

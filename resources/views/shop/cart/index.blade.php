@extends("layouts.main")


@section("content")

    <section class="mt-5 container ">
        <!-- Page Content Goes Here -->

        <h1 class="mb-6 display-5 fw-bold text-center">Warenkorb</h1>

        <div class="row g-4 g-md-8">
            <!-- Cart Items -->
            <div class="col-12 col-lg-6 col-xl-7">
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                        <tr>
                            <th class="d-none d-sm-table-cell"></th>
                            <th class="ps-sm-3">Details</th>
                            <th>Menge</th>
                            <th></th>
                        </tr>
                        </thead>
                        <tbody>

                        @foreach($cart as $element)
                            <x-shop.cart.element
                                :element="$element"
                            />
                        @endforeach

                        </tbody>
                    </table>
                </div>
            </div>
            <!-- /Cart Items -->
            <div class="col-12 col-lg-6 col-xl-5">
                <div class="bg-dark p-4 p-md-5 text-white">
                    <h3 class="fs-3 fw-bold m-0 text-center">Zusammenfassung</h3>
                    <div class="py-3 border-bottom-white-opacity">
                        <div class="d-flex justify-content-between align-items-center mb-2 flex-column flex-sm-row">
                            <p class="m-0 fw-bolder fs-6">Zwischensumme</p>
                            <p class="m-0 fs-6 fw-bolder">{!!   config("app.shop.currency_symbol") !!} {{ $cart_subtotal }}</p>
                        </div>
                        <div
                            class="d-flex justify-content-between align-items-center flex-column flex-sm-row mt-3 m-sm-0">
                            <p class="m-0 fw-bolder fs-6">Versandkosten</p>
                            <span class="text-white opacity-75 small">{!!   config("app.shop.currency_symbol") !!} 0.00</span>
                        </div>
                    </div>
                    <div class="py-3 border-bottom-white-opacity">
                        <div class="d-flex justify-content-between align-items-center flex-column flex-sm-row">
                            <div>
                                <p class="m-0 fs-5 fw-bold">Summe</p>
{{--                                <span class="text-white opacity-75 small">tax</span>--}}
                            </div>
                            <p class="mt-3 m-sm-0 fs-5 fw-bold">{!!   config("app.shop.currency_symbol") !!} {{ $cart_subtotal }}</p>
                        </div>
                    </div>

{{--                    <!-- Coupon Code-->--}}
{{--                    <button class="btn btn-link p-0 mt-2 text-white fw-bolder text-decoration-none" type="button"--}}
{{--                            data-bs-toggle="collapse" data-bs-target="#collapseExample" aria-expanded="false"--}}
{{--                            aria-controls="collapseExample">--}}
{{--                        Have a coupon code?--}}
{{--                    </button>--}}
{{--                    <div class="collapse" id="collapseExample">--}}
{{--                        <div class="card card-body bg-transparent p-0">--}}
{{--                            <div class="input-group mb-0 mt-2">--}}
{{--                                <input type="text" class="form-control border-0" placeholder="Enter coupon code">--}}
{{--                                <button--}}
{{--                                    class="btn btn-white text-dark px-3 btn-sm border-0 d-flex justify-content-center align-items-center">--}}
{{--                                    <i--}}
{{--                                        class="ri-checkbox-circle-line ri-lg"></i></button>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                    <!-- / Coupon Code-->--}}

                    <!-- Checkout Button-->
                    <a href="checkout.html" class="btn btn-white w-100 text-center mt-3"
                       role="button"><i class="ri-secure-payment-line align-bottom"></i> Proceed to checkout</a>
                    {{--                    <a href="checkout.html" class="btn btn-orange w-100 text-center mt-3"--}}
                    {{--                       role="button"><i class="ri-paypal-line align-bottom"></i> Checkout with PayPal</a>--}}
                    <!-- Checkout Button-->
                </div>

                <!-- Payment Icons-->
                {{--                <x-shop.cart.payment-icons/>--}}
                <!-- / Payment Icons-->
            </div>
            <!-- Cart Summary -->

            <!-- /Cart Summary -->
        </div>

        <!-- /Page Content -->
    </section>
    <!-- / Main Section-->
@endsection

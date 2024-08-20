@extends("layouts.main")


@section("content")
    <section class="mt-5 container ">
        <!-- Page Content Goes Here -->

        <h1 class="mb-4 display-5 fw-bold text-center">Bestellung abschließen</h1>

        <div class="row g-md-8 mt-4">
            <!-- Checkout Panel Left -->
            <div class="col-12 col-lg-6 col-xl-7">
                <div class="checkout-panel">
                    <h5 class="title-checkout">Empfänger</h5>
                </div>
            </div>
            <!-- / Checkout Panel Left -->

            <!-- Checkout Panel Summary -->
            <x-shop.cart.checkout.items
                :cart="$cart"
            />
            <!-- /Checkout Panel Summary -->
        </div>

        <!-- /Page Content -->
    </section>
@endsection

<?php
    if(!isset($cart)){
        $cart = new \App\Models\Cart();
    }
$user = auth()->user();
    ?>
<div {{ $attributes->class(['col-12 col-lg-6 col-xl-5']) }}>
    <div class="bg-light p-4 sticky-md-top top-5">
        <div class="border-bottom pb-3">

            @foreach($cart as $item)
                <x-shop.cart.checkout.item
                    :item="$item"
                />
            @endforeach

        </div>
        <div class="py-3 border-bottom">
            <div class="d-flex justify-content-between align-items-center mb-2">
                <p class="m-0 fw-bolder fs-6">Subtotal</p>
                <p class="m-0 fs-6 fw-bolder">{!! config("app.shop.currency_symbol") !!} {{ $user->cart_subtotal($user->cart()) }}</p>
            </div>

        </div>
        <div class="py-3 border-bottom">
            <div class="d-flex justify-content-between align-items-center">
                <div>
                    <p class="m-0 fw-bold fs-5">Summe</p>
{{--                    <span class="text-muted small">Inc $45.89 sales tax</span>--}}
                </div>
                <p class="m-0 fs-5 fw-bold">{!! config("app.shop.currency_symbol") !!} {{ $user->cart_subtotal($user->cart()) }}</p>
            </div>
        </div>
{{--        <div class="py-3 border-bottom">--}}
{{--            <div class="input-group mb-0">--}}
{{--                <input type="text" class="form-control" placeholder="Enter your coupon code">--}}
{{--                <button class="btn btn-dark btn-sm px-4">Apply</button>--}}
{{--            </div>--}}
{{--        </div>--}}
        <!-- Accept Terms Checkbox-->
        <form action="/checkout" method="POST">
            @csrf

        <div class="form-group form-check my-4">
            <input type="checkbox" class="form-check-input" id="accept-terms" required>
            <label class="form-check-label fw-bolder" for="accept-terms">Zustimmen zu </label>
        </div>
        <button type="submit"  class="btn btn-dark w-100" >Bestellung abschließen</button>
        </form>
    </div>
</div>

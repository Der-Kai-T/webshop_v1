<?php
if (!isset($cart)) {
    $cart = new \App\Models\Cart();
}
$user = auth()->user();
?>
<div {{ $attributes->class(['col-12 ']) }}>
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
                <p class="m-0 fw-bold fs-5">Summe</p>
                <p class="m-0 fw-bold fs-5 ">{!! config("app.shop.currency_symbol") !!} {{ $user->cart_subtotal($user->cart()) }}</p>
            </div>
        </div>
        <div class="py-3 border-bottom">
            <div class="d-flex justify-content-between align-items-center mb-2">
                <p class="m-0 fw-bolder fs-6">Budget</p>
                <p class="m-0 fs-6 fw-bolder">{!! config("app.shop.currency_symbol") !!} {{ $user->budget_() }}</p>
            </div>

        </div>
        <div class="py-3 border-bottom">
            <div class="d-flex justify-content-between align-items-center">
                <div>
                    <p class="m-0 fw-bold fs-5">verbleibendes Budget</p>
                </div>
                <?php
                $cart_total = 0;
                foreach ($user->cart() as $item) {
                    $cart_total += $item->sum();
                }
                $remaining_budget = $user->budget() - $cart_total;
                ?>
                <p class="m-0 fs-5 fw-bold"
                @if($remaining_budget < 0)
                    style="color: #ff0000"
                        @endif

                >{!! config("app.shop.currency_symbol") !!} {{ number_format($remaining_budget, 2, config("app.shop.decimal_separator"), config("app.shop.thousand_separator")) }}</p>
            </div>
        </div>
        {{--        <div class="py-3 border-bottom">--}}
        {{--            <div class="input-group mb-0">--}}
        {{--                <input type="text" class="form-control" placeholder="Enter your coupon code">--}}
        {{--                <button class="btn btn-dark btn-sm px-4">Apply</button>--}}
        {{--            </div>--}}
        {{--        </div>--}}
        <!-- Accept Terms Checkbox-->
        @if($remaining_budget >= 0)
        <form action="/checkout" method="POST">
            @csrf

            <div class="form-group form-check my-4">
                <input type="checkbox" class="form-check-input" id="accept-terms" required>
                <label class="form-check-label fw-bolder" for="accept-terms">Zustimmen zu </label>
            </div>
            <button type="submit" class="btn btn-dark w-100">Bestellung abschließen</button>
        </form>
        @else
            <span class="btn btn-danger w-100" style="cursor: default">Nicht ausreichend Budget um die Bestellung abzuschließen </span>
        @endif
    </div>
</div>

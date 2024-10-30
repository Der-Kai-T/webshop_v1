<div {{ $attributes }}>


    <?php
    $user = auth()->user();
    $cart = $user->cart();
    $sum = 0;
    ?>

    @foreach($cart as $cart_item)
        @php($sum += $cart_item->sum())
        <x-shop.cart.side.product
            :cartitem="$cart_item"
        />
    @endforeach


</div>
<div class="border-top pt-3">
    <div class="d-flex justify-content-between align-items-center">
        <p class="m-0 fw-bolder">Summe</p>
        <p class="m-0 fw-bolder">{!!   config("app.shop.currency_symbol") !!} {!!  number_format($sum,2, config("app.shop.decimal_separator"), config("app.shop.thousand_separator")) !!}</p>
    </div>
    <a href="/checkout"
       class="btn btn-orange btn-orange-chunky mt-5 mb-2 d-block text-center">zur Kasse</a>
    <a href="/cart"
       class="btn btn-dark fw-bolder d-block text-center transition-all opacity-50-hover">Warenkorb anzeigen</a>
</div>

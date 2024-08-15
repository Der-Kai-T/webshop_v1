<div {{ $attributes }}>


    <?php
    $user_id = auth()->user()->id;
    $cart = \App\Models\Cart::where("user_id", $user_id)->get();
    $sum = 0;
    ?>

    @foreach($cart as $cart_item)
        @php($sum += $cart_item->price)
        <x-shop.card.product
            :cartitem="$cart_item"
        />
    @endforeach


</div>
<div class="border-top pt-3">
    <div class="d-flex justify-content-between align-items-center">
        <p class="m-0 fw-bolder">Summe</p>
        <p class="m-0 fw-bolder">&euro; {{ $sum }}</p>
    </div>
    <a href="/checkout"
       class="btn btn-orange btn-orange-chunky mt-5 mb-2 d-block text-center">Checkout</a>
    <a href="/card"
       class="btn btn-dark fw-bolder d-block text-center transition-all opacity-50-hover">View Cart</a>
</div>

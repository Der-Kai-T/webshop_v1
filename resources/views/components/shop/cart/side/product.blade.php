<?php
    if(!isset($cartitem))
    {
        $cartitem = new \App\Models\Cart();
    }
    ?>
<div {{ $attributes->class(['row mx-0 pb-4 mb-4 border-bottom']) }}>
    <div class="col-3">
        <picture class="d-block bg-light">
            <img class="img-fluid" src="{{ $cartitem->item->main_image()->thumb() }}"
                 alt="{{ $cartitem->item->name }}">
        </picture>
    </div>
    <div class="col-9">
        <div>
            <h6 class="justify-content-between d-flex align-items-start mb-2">
                {{ $cartitem->item->name }}
                <form action="/cart/remove/{{ $cartitem->id }}" method="POST">
                    @csrf
                    <button type="submit" style="border:0; background:none;"><i class="ri-close-line"></i></button>
                </form>
            </h6>
            <small class="d-block text-muted fw-bolder">Größe: {{$cartitem->size->size}}</small>
            <small class="d-block text-muted fw-bolder">Menge: {{$cartitem->quantity}}</small>
        </div>
        <p class="fw-bolder text-end m-0">{!!   config("app.shop.currency_symbol") !!} {{ $cartitem->sum_() }}</p>
    </div>
</div>

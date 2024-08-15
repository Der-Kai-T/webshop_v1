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
                 alt="Bootstrap 5 Template by Pixel Rocket">
        </picture>
    </div>
    <div class="col-9">
        <div>
            <h6 class="justify-content-between d-flex align-items-start mb-2">
                {{ $cartitem->item->name }}
                <i class="ri-close-line"></i>
            </h6>
            <small class="d-block text-muted fw-bolder">Size: {{$cartitem->size}}</small>
            <small class="d-block text-muted fw-bolder">Qty: 1</small>
        </div>
        <p class="fw-bolder text-end m-0">&euro; {{ $cartitem->price }}</p>
    </div>
</div>

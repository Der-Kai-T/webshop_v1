<div {{ $attributes->class(['d-none d-md-flex justify-content-between align-items-start py-2']) }}>
    <div class="d-flex flex-grow-1 justify-content-start align-items-start">
        <div class="position-relative f-w-20 border p-2 me-4">
            <span class="checkout-item-qty">{{$item->quantity}}</span>
            <img src="{{ $item->item->main_image()->thumb() }}"
                 alt="{{ $item->item->name }}" class="rounded img-fluid">
        </div>
        <div>
            <p class="mb-1 fs-6 fw-bolder">{{ $item->item->name }}</p>
            <span class="fs-xs text-uppercase fw-bolder text-muted"> {{$item->size->size}}</span>
        </div>
    </div>
    <div class="flex-shrink-0 fw-bolder">
        <span>{!! config("app.shop.currency_symbol") !!} {{ $item->sum_() }}</span>
    </div>
</div>

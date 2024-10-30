<?php
    if (!isset($element)){
        $element = new \App\Models\Cart();
    }
    use App\Traits\CartHelper;
?>
<tr {{ $attributes }}>
    <!-- image -->
    <td class="d-none d-sm-table-cell">
        <picture class="d-block bg-light p-3 f-w-20">
            <img class="img-fluid"
                 src="{{ $element->item->main_image()->thumb() }}"
                 alt="{{ $element->item->name }}">
        </picture>
    </td>
    <!-- image -->

    <!-- Details -->
    <td>
        <div class="ps-sm-3">
            <h6 class="mb-2 fw-bolder">
                <a href="/item/{{$element->item->id}}">{{ $element->item->name }}</a>
            </h6>
            <small class="d-block text-muted"> Größe: {{ $element->size->size }}</small>
        </div>
    </td>
    <!-- Details -->

    <!-- Qty -->
    <td>
        <div class="px-3">
            <span class="small text-muted mt-1">{{$element->quantity}} @ {!!   config("app.shop.currency_symbol") !!} {{ $element->price_() }}</span>
        </div>
    </td>
    <!-- /Qty -->

    <!-- Actions -->
    <td class="f-h-0">
        <div class="d-flex justify-content-between flex-column align-items-end h-100">
            <form action="/cart/remove/{{ $element->id }}" method="POST">
                @csrf
                <button type="submit" style="border:0; background:none;"><i class="ri-close-circle-line ri-lg"></i></button>
            </form>
            <p class="fw-bolder mt-3 m-sm-0">{!!   config("app.shop.currency_symbol") !!} {{ $element->sum_() }}</p>
        </div>
    </td>
    <!-- /Actions -->

</tr>

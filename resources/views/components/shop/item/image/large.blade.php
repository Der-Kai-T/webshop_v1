<div {{ $attributes->class(['swiper-slide bg-white h-auto']) }}>
    <picture>
        <img class="img-fluid d-table mx-auto"
             src="{{ $src }}"
             alt="{{ $alt ?? "" }}"
             data-zoomable>
    </picture>
</div>

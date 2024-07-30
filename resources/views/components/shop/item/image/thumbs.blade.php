<div {{ $attributes->class(['swiper-slide bg-light bg-light h-auto']) }}>
    <picture>
        <img class="img-fluid mx-auto d-table"
             src="{{ $src }}"
             alt="{{ $alt ?? "Produktbild" }}">
    </picture>
</div>

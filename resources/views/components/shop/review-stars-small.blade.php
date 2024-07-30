<?php
    //calc percent from star-count
    $percent = 0;

    $stars = $stars ?? 0;
    $percent = ($stars / 5) *100;

    ?>

<!-- Review Stars Small-->
<div class="rating position-relative d-table">
    <div class="position-absolute stars" style="width: {{ $percent }}%">
        <i class="ri-star-fill text-dark mr-1"></i>
        <i class="ri-star-fill text-dark mr-1"></i>
        <i class="ri-star-fill text-dark mr-1"></i>
        <i class="ri-star-fill text-dark mr-1"></i>
        <i class="ri-star-fill text-dark mr-1"></i>
    </div>
    <div class="stars">
        <i class="ri-star-fill mr-1 text-muted opacity-25"></i>
        <i class="ri-star-fill mr-1 text-muted opacity-25"></i>
        <i class="ri-star-fill mr-1 text-muted opacity-25"></i>
        <i class="ri-star-fill mr-1 text-muted opacity-25"></i>
        <i class="ri-star-fill mr-1 text-muted opacity-25"></i>
    </div>
</div>            <small class="text-muted d-inline-block ms-2 fs-bolder">({{ $count ?? 0 }})</small>

<?php
    if(!isset($category))
        $category = new \App\Models\Category();
    ?>

<li {{ $attributes->class(['nav-item dropdown me-lg-4']) }}>
    <a
        class="nav-link fw-bolder dropdown-toggle py-lg-4" href="#" role="button"
       data-bs-toggle="dropdown"
       aria-haspopup="true"
       aria-expanded="false">
        {{ $category->name }}
    </a>
    <ul class="dropdown-menu">
        <li><a class="dropdown-item" href="/category/{{$category->id}}">alle {{ $category->name }}</a></li>
        <li><hr></li>
        @foreach($category->allChildren as $children)
            <li><a class="dropdown-item" href="/category/{{$children->id}}">{{ $children->name }}</a></li>
        @endforeach

    </ul>
</li>

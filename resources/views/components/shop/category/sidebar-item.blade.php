<li {{ $attributes->class(['mb-2']) }}><a
            class="text-decoration-none text-body text-secondary-hover transition-all d-flex justify-content-between align-items-center"
            href="/category/{{$category->id}}"><span><i class="ri-arrow-right-s-line align-bottom ms-n1"></i> {{$category->name}}</span>
        <span class="text-muted ms-4">({{$category->item->count()}})</span></a>
</li>

@props([
    /** @var \mixed */
    'cat'
])

<ul {{ $attributes }}>
    @foreach($cat->children as $child)
        <li>
            @php($href = "/admin/category/" .  $child->id . "/edit")
            {{ $child->name }} <x-admin.edit-link :href="$href"/>
            <x-admin.category.children :cat="$child" />
        </li>
    @endforeach
</ul>

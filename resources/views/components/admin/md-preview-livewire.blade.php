@props([
    'form' => 'form',
    'model',
    'title'
])

@php
    $wireModel = "{$form}.{$model}";
@endphp

<div class="row">
    <div class="col-12 markdown_header">
        {{ $title ?? "Vorschau:" }}
    </div>
</div>

<div class="row">
    <div class="col-12">
        <div
            x-data="{
                content: @entangle($wireModel),
                render() {
                    return DOMPurify.sanitize(marked.parse(this.content ?? ''));
                }
            }"
            class="markdown_preview"
            x-html="render()"
        ></div>
    </div>
</div>

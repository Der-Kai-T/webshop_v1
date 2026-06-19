<div {{ $attributes->class(['mb-3']) }}>
    @php
        $binding = ($form ?? 'form').'.'.$model;
    @endphp
    <label for="{{$model}}" class="form-label">{{ __($label ?? "validation.attributes.$model") }} @if(isset($optional))
            <small>optional</small>
        @endif</label>
    <input
        @if(!isset($optional))
            required
        @endif
        type="{{ $type ?? "text" }}"
        class="form-control"
        id="{{ $binding }}"
        wire:model="{{ $binding }}"
        @if(isset($placeholder))
        placeholder="{{ $placeholder }}"
        @endif

    >

    @error($binding)
    <span class="form-validation-error">{{ $message }}</span>
    @enderror
</div>

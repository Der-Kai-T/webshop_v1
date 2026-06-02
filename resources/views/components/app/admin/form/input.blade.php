<div {{ $attributes->class(['mb-3']) }}>
    <label for="{{$model}}" class="form-label">{{ __($label ?? "validation.attributes.$model") }} @if(isset($optional))
            <small>optional</small>
        @endif</label>
    <input
        @if(!isset($optional))
            required
        @endif
        type="{{ $type ?? "text" }}"
        class="form-control"
        id="{{ $form ?? "form" }}.{{ $model  }}"
        wire:model="{{ $form ?? "form" }}.{{ $model }}"
        @if(isset($placeholder))
        placeholder="{{ $placeholder }}"
        @endif

    >

    @error("form.$model")
    <span class="form-validation-error">{{ $message }}</span>
    @enderror
</div>

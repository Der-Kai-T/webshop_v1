<div class="form-check form-switch">
    <input
        class="form-check-input"
        type="checkbox"
        id="{{ $form ?? "form" }}.{{ $model  }}"
        wire:model.live.debounce="{{ $form ?? "form" }}.{{ $model }}"
    >

    <label for="{{$model}}" class="form-label">{{ __($label ?? "validation.attributes.$model") }} @if(isset($optional))
            <small>optional</small>
        @endif</label>

    @error("form.$model")
    <span class="form-validation-error">{{ $message }}</span>
    @enderror
</div>

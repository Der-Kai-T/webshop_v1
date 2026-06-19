<div {{ $attributes->class(['mb-3']) }}>
    <label for="{{$model}}" class="form-label">{{ __($label ?? "validation.attributes.$model") }} @if(isset($optional))
            <small>optional</small>
        @endif</label>
    <textarea
        @if(!isset($optional))
            required
        @endif
        class="form-control"
        id="{{ $form ?? "form" }}.{{ $model  }}"
        rows="{{ $rows ?? 4 }}"
        wire:model="{{ $form ?? "form" }}.{{ $model }}"
        @if(isset($placeholder))
            placeholder="{{ $placeholder }}"
        @endif

    ></textarea>

    @error("form.$model")
    <span class="form-validation-error">{{ $message }}</span>
    @enderror
</div>

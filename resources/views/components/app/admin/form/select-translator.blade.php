<div {{ $attributes->class(['mb-2']) }}>
    @php
        if(!isset($value))
            $value="id";

        if(!isset($text))
            $text="name";
    @endphp
    <label for="{{ $model }}" class="form-label">{{ __($label ?? "validation.attributes.$model") }}</label>
    <select @if(!isset($optional)) required @endif class="form-select" @if(isset($multiple))multiple size="{{ min($data->count(), 10) }}" @endif wire:model="{{ $form ?? "form" }}.{{ $model }}">

        @if(isset($withNull))
            <option value="" disabled selected hidden>Bitte auswählen</option>
        @endif

        @foreach($data as $d)
            <option value="{{ $d->$value }}">{{ __($d->$text) }}</option>
        @endforeach
    </select>
</div>

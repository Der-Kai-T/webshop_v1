<button type="submit" {{ $attributes->class(['btn btn-primary float-end']) }}>
    <span class="fas fa-save"></span>
    {{ __("save") }}
</button>

<button
    type="button"
    class="btn btn-secondary"
    @if(isset($abortFunction))
        wire:click="{{ $abortFunction }}"
    @endif

>
    <span class="fas fa-times"></span>
    {{ __("abort") }}
</button>

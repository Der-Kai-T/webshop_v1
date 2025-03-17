<div>
    <select wire:model="statusId" class="form-control" wire:change.debounce="update()">
        @foreach($allStatus as $s)
            <option value="{{ $s->id }}">{{ __($s->name) }}</option>
        @endforeach
    </select>
</div>

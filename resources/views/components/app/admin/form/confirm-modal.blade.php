<div
    class="modal fade"
    id="{{$id}}"
    data-bs-backdrop="static"
    data-bs-keyboard="false"
    tabindex="-1"
    aria-labelledby="{{$id}}Label"
    aria-hidden="true"
>
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content ">
            <div class="modal-header {{ $modalColor ?? "" }}">
                <h1 class="modal-title fs-5" id="{{$id}}Label">{{ __($title ?? "please confirm") }}</h1>
                <button type="button" class="btn-close" aria-label="Close"
                        @if(isset($abortFunction))
                            wire:click="{{$abortFunction}}"
                        @else
                            data-bs-dismiss="modal"
                    @endif

                ></button>
            </div>
            <div class="modal-body">
                {{ $slot }}
            </div>
            <div class="modal-footer">
                <button type="button" class="btn {{ $abortColor ?? "btn-secondary"}}"
                        @if(isset($abortFunction))
                            wire:click="{{$abortFunction}}"
                        @else
                            data-bs-dismiss="modal"
                        @endif
                >
                    <span class="{{ $abortIcon ?? "fas fa-times"}}"></span>
                    {{ __($abortText ?? "close") }}</button>
                <button type="button" class="btn {{ $submitColor ?? "btn-primary"}}"
                        wire:click="{{ $submitFunction }}"
                >
                    <span class="{{ $submitIcon ?? "fas fa-save"}}"></span>
                    {{ __($submitText ?? "save") }}
                </button>
            </div>
        </div>
    </div>
</div>

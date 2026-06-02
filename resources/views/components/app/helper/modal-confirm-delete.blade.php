<div>
    <div class="modal fade" id="{{ $id }}" tabindex="-1" aria-labelledby="{{ $id }}Label" aria-hidden="true" wire:ignore data-bs-backdrop="static" data-bs-keyboard="false">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="{{ $id }}Label">Löschen bestätigen</h1>

                </div>
                <div class="modal-body">
                    {{ $slot }}
                </div>
                <div class="modal-footer">

                    <button
                        type="button"
                        class="btn btn-secondary"
                        @if(isset($abortFunction))
                            wire:click="{{ $abortFunction }}"
                        @else
                            data-bs-dismiss="modal"
                        @endif

                    >
                        <span class="fas fa-times-circle mr-1"></span>
                        {{ __("abort") }}
                    </button>
                    <button
                        type="button"
                        class="btn btn-danger"
                        data-bs-dismiss="modal"
                        wire:click="{{ $deleteFunction }}"
                    >
                        <span class="fas fa-trash mr-1"></span>
                        {{ __("delete") }}
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>

<div>
    <div class="modal fade" id="{{ $id }}" tabindex="-1" aria-labelledby="{{ $id }}Label" aria-hidden="true" wire:ignore>
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="{{ $id }}Label">{{ $title }}</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    {{ $slot }}
                </div>
                <div class="modal-footer">
                    <button
                        type="button"
                        class="btn btn-secondary"
                            data-bs-dismiss="modal"
                    >
                        <span class="fas {{ $abortIcon ?? 'fa-times' }} mr-1"></span>
                        {{ __($abortText ?? "close") }}
                    </button>

                </div>
            </div>
        </div>
    </div>
</div>

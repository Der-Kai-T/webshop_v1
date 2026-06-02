<div>
<x-slot name="header">
    <h1> Bestellung {{ $order->number }}</h1>
</x-slot>

    <livewire:app.order.details :order="$order" />

    <div class="row mt-4">
        <div class="col-6">
            <form wire:submit="updateState">
            <div class="card">
                <div class="card-header">
                    Status der Bestellung
                </div>
                <div class="card-body">
                    <x-app.admin.form.select-translator model="status_id" :data="$status"/>
                </div>
                <div class="card-footer">
                    <x-admin.form.submit />
                </div>
            </div>
            </form>
        </div>
        <div class="col-6">
            <div class="card">
                <div class="card-header">
                    Bestellung löschen
                </div>
                <div class="card-body">
                    <button class="btn btn-warning"
                            data-bs-target="#DeleteOrder"
                            data-bs-toggle="modal"
                            >
                        <span class="fas fa-trash"></span>
                        Bestellung löschen
                    </button>

                </div>
            </div>
        </div>

        <x-app.helper.modal-confirm-delete
            id="DeleteOrder"
            title="gesamte Bestellung löschen"
            delete-function="deleteOrder">
            Bitte bestätigen Sie, dass Sie die gesamte
            Bestellung löschen möchten!
        </x-app.helper.modal-confirm-delete>
    </div>
</div>

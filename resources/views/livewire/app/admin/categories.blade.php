<div>
    <x-slot name="header">
        <h1>Kategorien</h1>
    </x-slot>

    <div class="row">
        <div class="col-6">
            <div class="card">
                <div class="card-header">
                    Kategorien
                </div>
                <div class="card-body p-0 card-body-scroll" id="category-scroll-container">
                    <table class="table table-striped table-sm table-bordered table-hover table-sticky">
                        <thead>
                        <tr>
                            <th>Kategorie</th>
                            <th>Unterkategorie</th>
                        </tr>
                        </thead>
                        @foreach($categories as $cat)
                            <tr
                                wire:click="selectCategory('{{ $cat->id }}')"
                            >
                                <td>{{ $cat->name }}</td>
                                <td>
                                    <ul>
                                        @foreach($cat->children as $child)
                                            <li>{{ $child->name }}</li>
                                        @endforeach
                                    </ul>
                                </td>
                            </tr>
                        @endforeach
                        <tbody>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <div class="col-6">
            <div class="card">
                <form wire:submit="categorySubmit">
                    <div class="card-header">
                        @if(is_null($form->category))
                            neue Kategorie anlegen
                        @else
                            Kategorie {{ $form->category->name }} bearbeiten

                            <div class="card-tools">
                                <button type="button"
                                        class="btn btn-warning btn-sm"
                                        data-bs-target="#categoryDeleteModal"
                                        data-bs-toggle="modal"
                                >
                                    <span class="fas fa-trash"></span>
                                </button>
                            </div>
                        @endif
                    </div>
                    <div class="card-body">
                        <x-app.admin.form.input model="name"/>
                        <x-app.admin.form.textarea model="description" optional/>
                    </div>
                    <div class="card-footer">
                        <x-admin.form.submit/>
                        <button
                            type="button"
                            class="btn btn-secondary"
                            wire:click="categoryAbort">
                            <span class="fas fa-times-circle"></span>
                            {{ __("abort") }}
                        </button>
                    </div>
                </form>
            </div>

            <x-app.helper.modal-confirm-delete
                id="categoryDeleteModal"
                delete-function="categoryDelete">
                Bitte bestätigen Sie, dass Sie diese Kategorie löschen möchten.
            </x-app.helper.modal-confirm-delete>

            <x-app.helper.modal-confirm-delete
                id="subCategoryDeleteModal"
                delete-function="subCategoryDelete">
                Bitte bestätigen Sie, dass Sie diese Unterkategorie löschen möchten.
            </x-app.helper.modal-confirm-delete>
            @if(!is_null($form->category))
                <div class="card mt-4">

                    <div class="card-header">
                        Unterkategorien
                        @if(!is_null($subCategory->category))
                            <div class="card-tools">
                                <button type="button"
                                        class="btn btn-warning btn-sm"
                                        data-bs-target="#subCategoryDeleteModal"
                                        data-bs-toggle="modal"
                                >
                                    <span class="fas fa-trash"></span>
                                </button>
                            </div>
                        @endif
                    </div>
                    <div class="card-body">
                        <form wire:submit="subCategorySubmit">
                            <x-app.admin.form.input model="name" form="subCategory"/>
                            <x-app.admin.form.textarea model="description" form="subCategory" optional/>
                            <x-admin.form.submit/>
                            <button
                                type="button"
                                class="btn btn-secondary"
                                wire:click="subCategoryAbort">
                                <span class="fas fa-times-circle"></span>
                                {{ __("abort") }}
                            </button>
                        </form>
                    </div>
                    <div class="card-body p-0">
                        <table class="table table-striped table-sm table-bordered table-sticky">
                            @foreach($form->category->children as $child)
                                <tr>
                                    <td>
                                        {{ $child->name }}
                                        <button type="button"
                                                class="btn btn-sm"
                                                wire:click="subCategorySelect('{{ $child->id }}')">
                                            <span class="fas fa-edit"></span>
                                        </button>
                                    </td>
                                </tr>
                            @endforeach
                        </table>
                    </div>


                </div>
            @endif
        </div>
    </div>
</div>

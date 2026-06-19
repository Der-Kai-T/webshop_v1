<div>
    <x-slot name="header">
        <h1>{{ $item->name }}</h1>
    </x-slot>

    <div class="row">
        <div class="col-12">
            <div class="card">
                <form wire:submit="formSubmit">
                    <div class="card-header">
                        Produkt-Details
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-6">
                                <x-app.admin.form.input model="name"/>
                                <x-app.admin.form.textarea model="description" rows="10"/>
                                <x-app.admin.form.input model="price"/>
                            </div>
                            <div class="col-6">
                                <x-admin.md-preview-livewire
                                    model="description"
                                    title="Vorschau Beschreibung"
                                />
                                <p>
                                    Die Anwendung verwendet GitHub-flavored Markdown zur Formatierung der
                                    Beschreibung. Ein
                                    <a href="https://github.com/adam-p/markdown-here/wiki/markdown-cheatsheet"
                                       target="_blank">
                                        Cheatsheet <span class="fas fa-external-link"></span>
                                    </a>
                                    findet sich z.B. im Projekt adam-p/markdown-here
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <x-admin.form.submit/>
                        <button
                            type="button"
                            class="btn btn-secondary"
                            wire:click="formAbort">
                            <span class="fas fa-times-circle"></span>
                            {{ __("abort") }}
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>


    <div class="row mt-4">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Kategorien</h3>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-6">
                            <div class="card">

                                <div class="card-body">
                                    <label class="col-form-label" for="name">zugewiesen</label>
                                    <select multiple
                                            wire:model="categories_to_remove"
                                            class="form-control"
                                            size="10">
                                        @foreach($categories_assigned as $cat)
                                            <option value="{{ $cat->id }}">
                                                {{ $cat->name }}
                                                @if($cat->parent)
                                                    (in {{ $cat->parent->name }})
                                                @endif
                                            </option>
                                        @endforeach
                                    </select>
                                    <button type="button"
                                            class="btn btn-primary w-100"
                                            wire:click="removeCategories"
                                    >
                                        Kategorie entfernen

                                        <span class="fas fa-arrow-right"></span>
                                        <span class="fas fa-arrow-right"></span>
                                        <span class="fas fa-arrow-right"></span>

                                    </button>

                                </div>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="card">


                                <div class="card-body">
                                    <label class="col-form-label" for="name">verfügbare</label>
                                    <select multiple
                                            wire:model="categories_to_assign"
                                            class="form-control"
                                            size="10">
                                        @foreach($categories_available as $cat)
                                            <optgroup label="{{ $cat->name }}">
                                                @foreach($cat->children as $child)
                                                    <option value="{{ $child->id }}">
                                                        {{ $child->name }}
                                                    </option>
                                                @endforeach
                                            </optgroup>
                                        @endforeach
                                    </select>
                                    <button type="button"
                                            class="btn btn-primary w-100"
                                            wire:click="assignCategories"
                                    >
                                        <span class="fas fa-arrow-left"></span>
                                        <span class="fas fa-arrow-left"></span>
                                        <span class="fas fa-arrow-left"></span>

                                        Kategorie zuweisen

                                    </button>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-footer">

                </div>
            </div>
        </div>
    </div>

    <div class="row mt-4">
        <div class="col-12">
            <div class="card" id="card_size">
                <div class="card-header">
                    <h3 class="card-title">Größen</h3>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-6">
                            <div class="card">
                                <div class="card-header">
                                    Verfügbar
                                </div>
                                <div class="card-body">
                                    <table class="table table-striped">
                                        <thead>
                                        <tr>
                                            <th>Größe</th>
                                            <th>Preis</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($item->sizes->sortBy("size") as $size)
                                            <tr>
                                                <td>
                                                    <button class="btn btn-primary btn-sm float-end"
                                                            type="button"
                                                            wire:click="sizeSelect('{{ $size->id }}')"
                                                    >
                                                        <span class="fas fa-edit"></span>
                                                    </button>

                                                    {{ $size->size }}

                                                </td>
                                                <td>
                                                    {{ $size->price_set ? __('validation.attributes.price_set') .": €" . $size->price_set : "" }}
                                                    {{ $size->price_add ? __('validation.attributes.price_add') .": €" . $size->price_add : "" }}
                                                    {{ $size->price_factor ? __('validation.attributes.price_factor') .": €" . $size->price_factor : "" }}
                                                </td>
                                            </tr>

                                        @endforeach
                                        </tbody>
                                    </table>


                                </div>
                            </div>
                        </div>
                        <div class="col-6">
                            <form wire:submit="sizeSubmit">
                                <div class="card">
                                    <div class="card-header">
                                        @if(is_null($sizeForm->sizeModel))
                                            neue Größe
                                        @else
                                            Größe bearbeiten
                                            <div class="card-tools">
                                                <button type="button"
                                                        class="btn btn-sm btn-warning"
                                                        data-bs-toggle="modal"
                                                        data-bs-target="#sizeDelete"
                                                >
                                                    <span class="fas fa-trash"></span>
                                                </button>
                                            </div>
                                        @endif

                                    </div>
                                    <div class="card-body">
                                        <x-app.admin.form.input form="sizeForm" model="size"/>
                                        <x-app.admin.form.input form="sizeForm" model="price_set" type="number"
                                                                optional/>
                                        <x-app.admin.form.input form="sizeForm" model="price_add" type="number"
                                                                optional/>
                                        <x-app.admin.form.input form="sizeForm" model="price_factor" type="number"
                                                                optional/>
                                        <x-app.admin.form.checkbox form="sizeForm" model="enabled" optional/>
                                    </div>
                                    <div class="card-footer">

                                        <x-admin.form.submit/>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <x-app.helper.modal-confirm-delete
                    id="sizeDelete"
                    delete-function="sizeDelete">
                    Bitte bestätigen Sie, dass Sie die Größe löschen möchten.
                </x-app.helper.modal-confirm-delete>
            </div>
        </div>
    </div>

    <div class="row mt-4">
        <div class="col-6">
            <div class="card">
                <div class="card-header">
                    Bilder
                </div>
                <div class="card-body p-0">
                    <table class="table table-striped">
                        @foreach($item->images->sortBy("sort") as $image)
                            <tr>
                                <td>
                                    <img src="{{ $image->src() }}"
                                         alt="{{ $image->alt }}"
                                         class="img-fluid"
                                         style="max-width: 40%"

                                    >
                                    <br>{{ $image->alt }}
                                </td>
                                <td>
                                    <button class="btn btn-primary btn-sm"
                                            wire:click="editImage('{{ $image->id }}')"
                                    >
                                        <span class="fas fa-edit"></span>
                                    </button>
                                </td>
                            </tr>
                        @endforeach
                    </table>
                </div>
            </div>
        </div>
        <div class="col-6">
            @if(is_null($imageForm->image))
                <div class="card">
                    <form wire:submit.prevent="uploadImage">
                        <div class="card-header">
                            Bild hochladen
                        </div>
                        <div class="card-body">
                            <div class="mb-3">
                                <label for="formFile" class="form-label">Bild hochladen</label>
                                <input class="form-control"
                                       type="file"
                                       id="formFile"
                                       accept="image/*"
                                       wire:model="image"
                                >
                                @error("image")
                                <span class="form-validation-error">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="card-footer">
                            <x-admin.form.submit/>
                        </div>
                    </form>
                </div>
            @else
                <div class="card">
                    <form wire:submit="imageFormSubmit">
                        <div class="card-header">
                            Bild bearbeiten
                            <div class="card-tools">
                                <button class="btn btn-sm btn-warning"
                                        type="button"
                                        data-bs-target="#confirmImageDelete"
                                        data-bs-toggle="modal"
                                >
                                    <span class="fas fa-trash"></span>
                                </button>
                            </div>
                        </div>

                        <div class="card-body">
                            <x-app.admin.form.input type="number" model="sort" form="imageForm" optional/>
                            <x-app.admin.form.input model="alt" form="imageForm" optional/>
                        </div>

                        <div class="card-footer">

                            <x-admin.form.submit/>
                            <button
                                type="button"
                                class="btn btn-secondary"
                                wire:click="imageAbort">
                                <span class="fas fa-times-circle"></span>
                                {{ __("abort") }}
                            </button>
                        </div>
                    </form>
                </div>



            @endif
                <x-app.helper.modal-confirm-delete
                    id="confirmImageDelete"
                    delete-function="deleteImage"
                >
                    Bitte bestätigen Sie, dass Sie dieses Bild löschen möchten.
                </x-app.helper.modal-confirm-delete>
        </div>
    </div>
</div>

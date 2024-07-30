@extends("adminlte::page")

<?php
if (isset($item)) {
    $action = "/admin/item/$item->id";
    $patch = true;
    $h3 = "Produkt $item->name bearbeiten";
} else {
    $action = "/admin/item";
    $patch = false;
    $h3 = "neues Produkt anlegen";
    $item = new \App\Models\Item();
}

?>

@section("content_header")
    <h1>Kategorien</h1>
@endsection

@section("content")

    <div class="row">
        <div class="col-12">
            <div class="card">
                <form action="{{$action}}" method="POST">
                    @csrf
                    @if($patch)
                        @method('PATCH')
                    @endif
                    <div class="card-header">
                        <h3 class="card-title">{{ $h3 }}</h3>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-12">
                                <x-admin.form.input
                                    name="name"
                                    label="Bezeichnung"
                                    value="{{$item->name}}"
                                    required
                                />
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-12">
                                <x-admin.form.textarea
                                    name="description"
                                    label="Beschreibung"
                                    value="{{$item->description}}"
                                    required
                                />
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-4">
                                <x-admin.form.input
                                    name="price"
                                    label="Grundpreis"
                                    value="{{ $item->price }}"
                                    required
                                />
                            </div>


                        </div>

                    </div>
                    <div class="card-footer">
                        <x-admin.form.submit/>
                    </div>
                </form>
            </div>
        </div>
    </div>


    @if($patch)
        {{--   Category     --}}

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Kategorien</h3>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-6">
                                <div class="card">
                                        <?php
                                        $categories = \App\Models\Category::whereNull("parent_id")->get();
                                        $assigned_categories = [];
                                        ?>

                                    <div class="card-body">
                                        <form action="/admin/item/{{$item->id}}/category_remove" method="POST">
                                            @csrf
                                            <label class="col-form-label" for="name">zugewiesen</label>
                                            <select multiple required name="id[]" id="id" class="form-control"
                                                    size="10">
                                                @foreach($item->categories->sortBy("name") as $cat)
                                                    @php($assigned_categories[] = $cat->name)
                                                    <option value="{{ $cat->id }}">{{ $cat->name }}
                                                        ({{ $cat->parent->name }})
                                                    </option>

                                                @endforeach
                                            </select>
                                            <x-admin.form.submit class="bg-info mt-2" text="Kategorie entfernen >>>"/>
                                        </form>

                                    </div>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="card">


                                    <div class="card-body">
                                        <form action="/admin/item/{{$item->id}}/category_add" method="POST">
                                            @csrf

                                            <label class="col-form-label" for="name">verfügbare</label>
                                            <select multiple required name="id[]" id="id" class="form-control"
                                                    size="10">
                                                @foreach($categories->sortBy("name") as $cat)

                                                    <optgroup label="{{$cat->name}}"></optgroup>
                                                    @foreach($cat->allChildren()->get() as $child)
                                                        @if(!in_array($child->name, $assigned_categories))
                                                            <option value="{{ $child->id }}">{{ $child->name }}</option>
                                                        @endif
                                                    @endforeach
                                                @endforeach
                                            </select>
                                            <x-admin.form.submit class="bg-info mt-2" text="<<< Kategorie zuweisen"/>
                                        </form>
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



        <div class="row">
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
                                                <th></th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @foreach($item->sizes->sortBy("size") as $size)
                                                <tr>
                                                    <td>{{ $size->size }}</td>
                                                    <td>
                                                        {{ $size->price_set ? "Set: €" . $size->price_set : "" }}
                                                        {{ $size->price_add ? "Add: €" . $size->price_add : "" }}
                                                        {{ $size->price_factor ? "Factor: €" . $size->price_factor : "" }}
                                                    </td>
                                                </tr>

                                            @endforeach
                                            </tbody>
                                        </table>


                                    </div>
                                </div>
                            </div>
                            <div class="col-6">
                                <form action="/admin/item/{{$item->id}}/size_add" method="POST">
                                    @csrf

                                    <div class="card">
                                        <div class="card-header">
                                            neue Größe
                                        </div>
                                        <div class="card-body">
                                            <x-admin.form.input
                                                name="size"
                                                label="Größe"
                                                required
                                            />

                                            <x-admin.form.input
                                                name="price_set"
                                                label="Preis überschreiben"
                                            />

                                            <x-admin.form.input
                                                name="price_add"
                                                label="Preis anpassen (+/-)"
                                            />

                                            <x-admin.form.input
                                                name="price_factor"
                                                label="Preis multiplizieren mit"
                                            />
                                        </div>
                                        <div class="card-footer">
                                            <x-admin.form.submit/>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">

                    </div>
                </div>
            </div>
        </div>

        <div class="row" id="card_images">
            <div class="col-6">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Verknüpfte Bilder</h3>
                    </div>
                    <div class="card-body">
                        <table class="table table-striped">
                            <thead>
                            <tr>
                                <th>Img</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($item->images->sortBy("sort") as $image)
                                <tr>
                                    <td>
                                        <img src="{{asset($image->thumb())}}" alt="{{$image->alt}}">
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="card-footer">

                    </div>
                </div>
            </div>
            <div class="col-6">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title"></h3>
                    </div>
                    <div class="card-body">
                        <form action='/admin/item/{{$item->id}}/upload' class="dropzone" id='dropzoneItem'>
                            @csrf

                            <div class='dz-message' data-dz-message>
                                <span>Ziehen Sie Dateien hierhin um sie hochzuladen<br> alternativ klicken Sie auf diese Fläche um einen Datei-Dialog zu erhalten</span>
                            </div>

                        </form>
                    </div>
                    <div class="card-footer">

                    </div>
                </div>
            </div>
        </div>



        <x-admin.delete name="Artikel {{$item->name}}" action="/admin/item/{{$item->id}}"/>


        <script>
            Dropzone.options.dropzoneItem = {
                maxFiles: 25,
                init: function () {

                    this.on('success', function () {
                        $('#attachment_t_body').load('');
                        //this.removeAllFiles(true);
                    });
                }
            };
        </script>
    @endif


@endsection

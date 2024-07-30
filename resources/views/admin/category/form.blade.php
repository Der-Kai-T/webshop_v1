@extends("adminlte::page")

<?php
if (isset($category)) {
    $action = "/admin/category/$category->id";
    $patch = true;
    $h3 = "Kategorie $category->name bearbeiten";
} else {
    $action = "/admin/category";
    $patch = false;
    $h3 = "neue Kategorie anlegen";
    $category = new \App\Models\Category();
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
                                    value="{{$category->name}}"
                                    required
                                />
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-12">
                                <x-admin.form.textarea
                                    name="description"
                                    label="Beschreibung"
                                    value="{{$category->description}}"

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

        <div class="row">
            <div class="col-6">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Unterkategorien</h3>
                    </div>
                    <div class="card-body">
                        <table class="table table-striped dataTable">
                            <thead>
                            <tr>
                                <th>Kategorie</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($category->allChildren as $children)
                                <tr>
                                    <td>{{ $children->name }}  <x-admin.edit-link href="/admin/category/{{$children->id}}/edit" /></td>
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
                <form action="/admin/category/{{$category->id}}/child_category" method="POST">
                    @csrf

                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">neue Kategorie anlegen</h3>
                        </div>
                        <div class="card-body">
                            <x-admin.form.input
                                name="name"
                                label="Kategorie"
                                required
                            />
                            <x-admin.form.textarea
                                name="description"
                                label="Beschreibung"
                            />
                        </div>
                        <div class="card-footer">
                            <x-admin.form.submit />
                        </div>
                    </div>
                </form>
            </div>
        </div>



        <x-admin.delete_section action="/admin/category/{{$category->id}}" name="Kategorie"/>
    @endif
@endsection

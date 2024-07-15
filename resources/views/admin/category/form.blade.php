@extends("adminlte::page")

<?php
    if(isset($category)){
        $action = "/admin/category/$category->id";
        $patch = true;
        $h3 = "Kategorie $category->name bearbeiten";
    }else{
        $action = "admin/category";
        $patch = false;
        $h3 = "neue Kategorie anlegen";
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
                    @if($patch) @method('PATCH')@endif
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
                                    required
                                />
                            </div>
                        </div>

                    </div>
                    <div class="card-footer">
                        <x-admin.form.submit />
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection

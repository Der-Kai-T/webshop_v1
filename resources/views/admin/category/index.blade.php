@extends("adminlte::page")


@section("content_header")
    <h1>Kategorien</h1>
@endsection

@section("content")
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <div class="card-tools">

                    </div>
                </div>

                <div class="card-body">
                    <table class="table table-striped datatable">
                        <thead>
                            <tr>
                                <th>Kategorie</th>
                                <th>Unterkategorien</th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach($category as $cat)
                                <tr>
                                    <td>
                                        @php($href = "/admin/category/" .  $cat->id . "/edit")
                                        {{ $cat->name }}
                                        <x-admin.edit-link :href="$href"/>
                                    </td>
                                    <td>
                                       <x-admin.category.children :cat="$cat"/>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection




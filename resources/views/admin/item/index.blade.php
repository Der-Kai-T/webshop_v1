@extends("adminlte::page")


@section("content_header")
    <h1>Artikel</h1>
@endsection

@section("content")
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <div class="card-tools">
                        <x-admin.card.button href="/admin/item/create" />
                    </div>
                </div>

                <div class="card-body">
                    <table class="table table-striped datatable">
                        <thead>
                            <tr>
                                <th>Artikel</th>
                                <th>Kategorie</th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach($items as $item)
                                <tr>
                                   <td>{{ $item->name }} <x-admin.edit-link href="/admin/item/{{$item->id}}/edit" /></td>
                                    <td>
                                        <ul>
                                            @foreach($item->categories as $category)
                                                <li>{{ $category->name }}</li>
                                            @endforeach
                                        </ul>
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




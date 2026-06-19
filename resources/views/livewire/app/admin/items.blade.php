<div>
    <x-slot name="header">
        <h1>Artikel</h1>
    </x-slot>

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    Artikel-Liste
                </div>

                <div class="card-body">
                    <table class="table table-striped">
                        <thead>
                                <tr>
                                    <th>Artikel</th>
                                    <th>Kategorie(n)</th>
                                </tr>
                        </thead>
                        <tbody>
                        @foreach($items as $item)
                            <tr>
                                <td>
                                   <a href="{{ route("admin.item.edit", $item->id) }}" wire:navigate.hover> {{ $item->name }}</a>
                                </td>
                                <td>
                                    {{ join(", ", $item->categories->pluck("name")->toArray()) }}
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

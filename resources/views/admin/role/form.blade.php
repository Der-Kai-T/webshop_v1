@extends("adminlte::page")

@section("content_header")
    <h1>Rollen</h1>
@endsection

<?php
if (!isset($role)) {
    $role = new \App\Models\Role();
    $h3 = "neue Rolle anlegen";
    $action = "/admin/role";
    $patch = false;
} else {
    $h3 = "Rolle  $role->name bearbeiten";
    $action = "/admin/role/$role->id";
    $patch = true;
}
?>

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
                        <x-admin.form.input
                            name="name"
                            value="{{$role->name}}"
                            required
                            label="Name"
                        />
                    </div>
                    <div class="card-footer">
                        <x-admin.form.submit/>
                    </div>
                </form>
            </div>
        </div>
    </div>

    @if($patch)

        <?php
            $references = $role->permissions;
            $all = \App\Models\Permission::all();
            ?>

        <x-admin.twolists
        :references="$references"
        :all="$all"
        action="/admin/role/{{$role->id}}/permission"
        label="Berechtigung"
        sort-by="name"
        key="name"
        value="name"

        />


    @endif
@endsection

@extends("adminlte::page")

@section("content_header")
    <h1>Teams</h1>
@endsection

<?php
if (!isset($team)) {
    $team = new \App\Models\Team();
    $h3 = "neues Team anlegen";
    $action = "/admin/team";
    $patch = false;
} else {
    $h3 = "Team $team->name bearbeiten";
    $action = "/admin/team/$team->id";
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
                        <div class="row">
                            <div class="col-12">
                                <x-admin.form.input
                                    name="name"
                                    label="Name"
                                    value="{{$team->name}}"
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


    @if($patch)

        <?php
            $references = $team->user;
            $all = \App\Models\User::all();

            ?>
        <x-admin.twolists
            action="/admin/team/{{$team->id}}/user"
            label="Benutzer"
            :references="$references"
            :all="$all"
            sort-by="name_last"
            key="id"
            value="name"
        />









    @endif


@endsection










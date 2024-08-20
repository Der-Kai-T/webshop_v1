@extends("adminlte::page")

@section("content_header")
    <h1>Benutzerverwaltung</h1>
@endsection


<?php
    if(!isset($user)){
        $user = new \App\Models\User();
        $h3  = "neuen Benutzer anlegen";
        $action = "/admin/user";
        $patch = false;

    }else{
        $h3 = "Benutzer $user->name_last, $user->name_first bearbeiten";
        $action = "/admin/user/$user->id";
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
                    <h3 class="card-title">{{$h3}}</h3>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-6">
                            <x-admin.form.input
                                name="name_first"
                                label="Vorname"
                                value="{{$user->name_first}}"
                                required
                                />
                        </div>
                        <div class="col-6">
                            <x-admin.form.input
                                name="name_last"
                                label="Vorname"
                                value="{{$user->name_last}}"
                                required
                            />
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-6">
                            <x-admin.form.input
                                name="employee_number"
                                label="Mitarbeiter-Nummer"
                                value="{{$user->employee_number}}"
                                required
                            />
                        </div>
                        <div class="col-6">
                            <x-admin.form.input
                                name="email"
                                label="E-Mail"
                                type="email"
                                value="{{$user->email}}"
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
            $references = $user->roles;
            $all = \App\Models\Role::all();
            ?>
        <x-admin.twolists
            :references="$references"
            :all="$all"
            key="name"
            sort-by="name"
            value="name"
            action="/admin/user/{{$user->id}}/role"
            label="Rollen"
         />
    @endif
@endsection

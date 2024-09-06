<?php

namespace App\Http\Controllers;

use App\Models\HistoryStatus;
use App\Models\TeamUser;
use App\Models\User;
use App\Models\UserHistory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class AdminUserController extends Controller
{
    protected string $permission = "admin.user";

    public function index()
    {
        $this->check_permission("index");
        return view("admin.user.index", [
            "user" => User::all()
        ]);
    }

    public function create()
    {
        $this->check_permission("create");
        return view("admin.user.form");
    }

    public function store(Request $request)
    {
        $this->check_permission("create");
        $data = $request->validate([
            "name_first" => "required",
            "name_last" => "required",
            "email" => "required",
            "employee_number" => "required",
        ]);

        $password = Str::password(14);
        $data['password'] = Hash::make($password);

        $user = User::create($data);

        return redirect("/admin/user/$user->id/edit")->with("success", "Passwort: $password");
    }


    public function edit(User $user)
    {
        $this->check_permission("update");
        return view("admin.user.form", [
            "user" => $user
        ]);
    }

    public function update(Request $request, User $user)
    {
        $this->check_permission("update");
        $data = $request->validate([
            "name_first" => "required",
            "name_last" => "required",
            "email" => "required",
            "employee_number" => "required",
        ]);

        $user->update($data);
    }

    public function addRole(Request $request, User $user)
    {
        $this->check_permission("update");
        $data = $request->validate([
            "name" => "required"
        ]);

        foreach ($data['name'] as $role) {
            $user->assignRole($role);
        }

        return redirect("/admin/user/$user->id/edit")->with("success", "Rollen hinzugefügt");
    }

    public function removeRole(Request $request, User $user)
    {
        $this->check_permission("update");
        $data = $request->validate([
            "name" => "required"
        ]);

        foreach ($data['name'] as $role) {
            $user->removeRole($role);
        }

        return redirect("/admin/user/$user->id/edit")->with("success", "Rollen entfernt");


    }

    public
    function addTeam(Request $request, User $user)
    {
        $this->check_permission("update");
        $data = $request->validate([
            "id" => "required"
        ]);

        foreach ($data['id'] as $team) {
            TeamUser::create([
                "user_id" => $user->id,
                "team_id" => $team
            ]);
        }

        return redirect("/admin/user/$user->id/edit")->with("success", "Rollen hinzugefügt");
    }

    public
    function removeTeam(Request $request, User $user)
    {
        $this->check_permission("update");
        $data = $request->validate([
            "name" => "required"
        ]);

        foreach ($data['name'] as $team) {
            TeamUser::where("team_id", $team)
                ->where("user_id", $user->id)
                ->delete();
        }

        return redirect("/admin/user/$user->id/edit")->with("success", "Rollen entfernt");
    }

    public function createHistory(User $user)
    {
        $this->check_permission("history");
        return view("admin.user.history", [
            "user" => $user
        ]);
    }


    public function storeHistory(Request $request, User $user)
    {
        $this->check_permission("history");

        $data = $request->validate([
            "add" => ["nullable", "numeric"],
            "subtract" => ["nullable", "numeric"],
        ]);

        if(is_null($data['add']) && is_null($data['subtract'])) {
            return back()->with("error", "genau ein Feld muss ausgefüllt sein");
        }

        if(!is_null($data['add']) && !is_null($data['subtract'])) {
            return back()->with("error", "genau ein Feld muss ausgefüllt sein");
        }

        UserHistory::create([
            "user_id" => $user->id,
            "add" => $data['add'],
            "subtract" => $data['subtract'],
            "manual" => true,
            "status_id" => HistoryStatus::where("name", "delivered")->first()->id,
            "number" => Str::random(10),
        ]);


        return redirect("/admin/user/$user->id/edit")->with("success", "Buchung hinzugefügt");
    }
}














<?php

namespace App\Http\Controllers;

use App\Models\User;
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

        foreach($data['name'] as $role){
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

        foreach($data['name'] as $role){
            $user->removeRole($role);
        }

        return redirect("/admin/user/$user->id/edit")->with("success", "Rollen entfernt");
    }

}

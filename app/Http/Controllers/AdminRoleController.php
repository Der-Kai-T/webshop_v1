<?php

namespace App\Http\Controllers;

use App\Models\Role;
use Illuminate\Http\Request;

class AdminRoleController extends Controller
{
    protected string $permission = "admin.role";
    public function index()
    {
        $this->check_permission("index");
        return view("admin.role.index", [
            "roles" => Role::all()
        ]);
    }

    public function create()
    {
        $this->check_permission("create");

        return view("admin.role.form");
    }

    public function store(Request $request)
    {
        $this->check_permission("create");

        $data = $request->validate([
            "name" => "required|unique:roles,name",
        ]);

        $role = Role::create($data);

        return redirect("/admin/role/$role->id/edit")->with("success", "Rolle angelegt");

    }


    public function edit(Role $role)
    {
        $this->check_permission("update");

        return view("admin.role.form", [
            "role" => $role
        ]);
    }

    public function update(Request $request, Role $role)
    {
        $this->check_permission("update");

        $data = $request->validate([
            "name" => "required|unique:roles,name",
        ]);

        $role->update($data);

        return redirect("/admin/role/$role->id/edit")->with("success", "Rolle bearbeitet");
    }

    public function destroy(Role $role)
    {
        $this->check_permission("delete");

        $role_name = $role;
        $role->delete();
        return redirect("/admin/role")->with("success", "Rolle $role_name gelöscht");
    }


    public function addPermission(Request $request, Role $role)
    {
        $this->check_permission("update");

        $data = $request->validate([
            "name" => "required"
        ]);

        foreach($data['name'] as $permission) {
            $role->givePermissionTo($permission);
        }

        return redirect("/admin/role/$role->id/edit")->with("success", "Berechtigungen bearbeitet");
    }

    public function removePermission(Request $request, Role $role)
    {
        $this->check_permission("update");

        $data = $request->validate([
            "name" => "required"
        ]);

        foreach($data['name'] as $permission) {
            $role->revokePermissionTo($permission);
        }

        return redirect("/admin/role/$role->id/edit")->with("success", "Berechtigungen bearbeitet");
    }



}

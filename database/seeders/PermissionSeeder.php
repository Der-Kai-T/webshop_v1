<?php

namespace Database\Seeders;

use App\Models\Permission;
use App\Models\Role;
use Illuminate\Database\Seeder;
use function Laravel\Prompts\info;

class PermissionSeeder extends Seeder
{

    public function run(): void
    {
        $functions = [
            "index",
            "create",
            "update",
            "delete",
            "*",
            "" //required for adminlte menus
        ];


        $permissions = [
            "admin.item",
            "admin.category",
            "admin.user",
            "admin.team",
            "admin.role",
            "admin.article",
            "admin.order",
        ];

        $custom_permissions = [
            "admin.user.history",
        ];


        info("Creating permissions");

        foreach ($permissions as $permission) {
            foreach ($functions as $function) {
                $perm = $permission . "." . $function;
                //remove trailing dot
                if(str_ends_with($perm, ".")){
                    $perm = substr($perm, 0, -1);
                }
                $this->create_permission($perm);
            }
        }


        foreach($custom_permissions as $permission){
            $this->create_permission($permission);
        }

    }

    protected function create_permission(string $permission) :null
    {
        if (!Permission::where('name', $permission)->exists()) {
            Permission::create([
                "name" => $permission
            ]);
            $this->command->info("Permission $permission created");
        } else {
            $this->command->warn("Permission $permission already exists.");
        }
        return null;
    }
}

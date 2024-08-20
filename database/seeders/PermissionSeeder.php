<?php

namespace Database\Seeders;

use App\Models\Permission;
use App\Models\Role;
use Illuminate\Database\Seeder;

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
            ""

        ];


        $permissions = [
            "admin.item",
            "admin.category",
            "admin.user",
            "admin.team",
            "admin.role",
            "admin.article",
        ];


        foreach ($permissions as $permission) {
            foreach ($functions as $function) {
                $perm = $permission . "." . $function;
                //remove trailing dot
                if(str_ends_with($perm, ".")){
                    $perm = substr($perm, 0, -1);
                }

                if (!Permission::where('name', $perm)->exists()) {
                    Permission::create([
                        "name" => $perm
                    ]);
                    $this->command->info("Permission $perm created");
                } else {
                    $this->command->warn("Permission $perm already exists.");
                }
            }
        }

    }
}

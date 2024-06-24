<?php

namespace Database\Seeders;

use App\Models\Spatie\Role;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        if(env("APP_ENV") == "local"){
            $password = "password";
        }else{
            $password = Str::password();
         }

        $admin = User::create([
            "name_first" => "Administrator",
            "name_last" => "Admin",
            "email" => "admin@example.org",
            "password" => Hash::make($password),
            "employee_number" => "1"
        ]);

        echo "Admin created: " . $admin->email . " with Password  " . $password . "\n";

        $superadmin = Role::create(["name" => "super-admin"]);
        $admin->assignRole($superadmin);
    }

}

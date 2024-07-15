<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use function Laravel\Prompts\confirm;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        if(config("app.env") == "local"){
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

        $this->call([

        ]);


        $seed_dummy_data = confirm(
            label: 'Do you want to seed some random data?',
            default: false
        );

        if($seed_dummy_data) {
            $this->call(DemoSeeder::class);
        }

    }

}

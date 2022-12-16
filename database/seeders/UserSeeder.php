<?php

namespace Database\Seeders;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;


class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin_role = Role::create(['name' => 'admin']);
        $admin = User::create([
            'name' => 'admin',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('admin123'),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);
        $admin->assignRole($admin_role);

        $mojopanggung_role = Role::create(['name' => 'mojopanggung']);
        $mojopanggung = User::create([
            'name' => 'mojopanggung',
            'email' => 'mojopanggung@gmail.com',
            'password' => bcrypt('mojopanggung123'),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]); 
        $mojopanggung->assignRole($mojopanggung_role);
    }
}

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
            'name' => 'Admin',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('admin123'),
            'type' => 'admin',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);
        $admin->assignRole($admin_role);

        $user = Role::create(['name' => 'user']);
        $mojopanggung = User::create([
            'name' => 'Mojopanggung',
            'email' => 'mojopanggung@gmail.com',
            'password' => bcrypt('mojopanggung123'),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);
        $mojopanggung->assignRole($user);


        $kelgiri = User::create([
            'name' => 'Giri',
            'email' => 'giri@gmail.com',
            'password' => bcrypt('giri123'),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);
        $kelgiri->assignRole($user);


        $boyolangu = User::create([
            'name' => 'Boyolangu',
            'email' => 'boyolangu@gmail.com',
            'password' => bcrypt('boyolangu123'),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);
        $boyolangu->assignRole($user);


        $grogol = User::create([
            'name' => 'Grogol',
            'email' => 'grogol@gmail.com',
            'password' => bcrypt('grogol123'),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);
        $grogol->assignRole($user);


        $penataban = User::create([
            'name' => 'Penataban',
            'email' => 'penataban@gmail.com',
            'password' => bcrypt('penataban123'),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);
        $penataban->assignRole($user);


        $jambesari = User::create([
            'name' => 'Jambesari',
            'email' => 'jambesari@gmail.com',
            'password' => bcrypt('jambesari123'),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);
        $jambesari->assignRole($user);
    }
}

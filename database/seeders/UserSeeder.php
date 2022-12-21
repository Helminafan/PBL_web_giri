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

        $kelgiri_role = Role::create(['name' => 'giri']);
        $kelgiri = User::create([
            'name' => 'giri',
            'email' => 'giri@gmail.com',
            'password' => bcrypt('giri123'),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);
        $kelgiri->assignRole($kelgiri_role);

        $boyolangu_role = Role::create(['name' => 'boyolangu']);
        $boyolangu = User::create([
            'name' => 'boyolangu',
            'email' => 'boyolangu@gmail.com',
            'password' => bcrypt('boyolangu123'),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);
        $boyolangu->assignRole($boyolangu_role);

        $grogol_role = Role::create(['name' => 'grogol']);
        $grogol = User::create([
            'name' => 'grogol',
            'email' => 'grogol@gmail.com',
            'password' => bcrypt('grogol123'),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);
        $grogol->assignRole($grogol_role);

        $penataban_role = Role::create(['name' => 'penataban']);
        $penataban = User::create([
            'name' => 'penataban',
            'email' => 'penataban@gmail.com',
            'password' => bcrypt('penataban123'),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);
        $penataban->assignRole($penataban_role);

        $jembersari_role = Role::create(['name' => 'jembersari']);
        $jembersari = User::create([
            'name' => 'jembersari',
            'email' => 'jembersari@gmail.com',
            'password' => bcrypt('jembersari123'),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);
        $jembersari->assignRole($jembersari_role);
    }
}

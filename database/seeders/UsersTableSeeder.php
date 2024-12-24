<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Admin;
use App\Models\Roles;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Admin::truncate();
        $adminRoles  = Roles::where('name', 'admin')->first();
        $authorRoles = Roles::where('name', 'staff')->first();
        $userRoles   = Roles::where('name', 'manager')->first();

        $admin = Admin::create([
            'admin_name' => 'admin',
            'admin_email' => 'admin@gmail.com',
            'admin_password' => md5('123'),
            'admin_phone' => '0795579213',
        ]);
        $author = Admin::create([
            'admin_name' => 'Viet Tin',
            'admin_email' => 'nviettin48@gmail.com',
            'admin_password' => md5('123'),
            'admin_phone' => '0795579213',
        ]);
        $user = Admin::create([
            'admin_name' => 'Viet Tin Nguyen',
            'admin_email' => 'tindepzai91@gmail.com',
            'admin_password' => md5('123'),
            'admin_phone' => '0795579213',
        ]);
        $admin->roles()->attach($adminRoles);
        $author->roles()->attach($authorRoles);
        $user->roles()->attach($userRoles);
    }
}

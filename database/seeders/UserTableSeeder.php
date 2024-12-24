<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class UserTableSeeder extends Seeder
{
    public function run(): void
    {
        $user = User::create([
            'email' => 'jobbox@gmail.com',
            'password' => Hash::make('admin123'),
            'is_root' => 1,
            'email_verified_at' => Carbon::now(),
            'remember_token' => Str::random(10),
        ]);

        $role = Role::create([
            'name' => 'Super Admin',
            'guard_name' => 'web',
        ]);

        $permissions = Permission::pluck('id', 'id')->all();

        $role->syncPermissions($permissions);

        $user->assignRole([
            'name' => 'Super Admin',
        ]);
    }
}

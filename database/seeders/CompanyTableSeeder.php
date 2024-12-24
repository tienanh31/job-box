<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Spatie\Permission\Models\Role;

class CompanyTableSeeder extends Seeder
{
    public function run(): void
    {
        $user = User::create([
            'email' => 'hr@vnpt.com',
            'password' => Hash::make('admin123'),
            'is_root' => 0,
            'email_verified_at' => Carbon::now(),
            'remember_token' => Str::random(10),
        ]);

        $role = Role::create([
            'name' => 'Company',
            'guard_name' => 'web',
        ]);

        $permissions = [
            'company-profile-create',
            'company-job-list',
            'company-job-create',
            'company-job-edit',
            'company-job-delete',
            'company-job-apply',
        ];

        $role->syncPermissions($permissions);

        $user->assignRole('Company');
    }
}

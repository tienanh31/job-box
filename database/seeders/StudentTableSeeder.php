<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Spatie\Permission\Models\Role;

class StudentTableSeeder extends Seeder
{
    public function run(): void
    {
        $user = User::create([
            'email' => 'voduchuy2001@gmail.com',
            'password' => Hash::make('admin123'),
            'is_root' => 0,
            'email_verified_at' => Carbon::now(),
            'remember_token' => Str::random(10),
        ]);

        $role = Role::create([
            'name' => 'Student',
            'guard_name' => 'web',
        ]);

        $permissions = [
            'student-profile-create',
            'student-resume-create',
            'student-job-wishlist',
            'student-add-job-to-wishlist',
            'student-job-applied',
        ];

        $role->syncPermissions($permissions);

        $user->assignRole('Student');
    }
}

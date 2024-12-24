<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionTableSeeder extends Seeder
{
    public function run(): void
    {
        $permissions = [
            'site-settings',
            'dashboard',
            'media-file',
            'permission-user-edit',
            'notification-list',
            'notification-edit',
            'role-user-edit',
            'role-permission',
            'role-create',
            'role-edit',
            'role-delete',
            'user-list',
            'user-create',
            'user-edit',
            'category-list',
            'category-create',
            'category-edit',
            'category-delete',
            'job-list',
            'job-create',
            'job-edit',
            'job-delete',
            'job-reverse',
            'faq-list',
            'faq-edit',
            'faq-create',
            'faq-delete',
            'company-profile-create',
            'company-job-list',
            'company-job-create',
            'company-job-edit',
            'company-job-delete',
            'company-job-apply',
            'trending-word-list',
            'trending-word-delete',
            'trending-word-edit',
            'student-profile-create',
            'student-resume-create',
            'student-job-wishlist',
            'student-add-job-to-wishlist',
            'student-job-applied',
        ];

        foreach ($permissions as $permission) {
            Permission::create([
                'name' => $permission,
                'guard_name' => 'web',
            ]);
        }
    }
}

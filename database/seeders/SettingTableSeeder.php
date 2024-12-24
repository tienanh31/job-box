<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SettingTableSeeder extends Seeder
{
    public function run(): void
    {
        $settings = [
            [
                'name' => 'privacyPolicy',
                'payload' => 'ex...',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'termAndCondition',
                'payload' => 'ex...',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'phoneNumber',
                'payload' => 'ex...',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'facebook',
                'payload' => 'ex...',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'youtube',
                'payload' => 'ex...',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'siteSlogan',
                'payload' => 'ex...',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'siteDescription',
                'payload' => 'ex...',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'siteName',
                'payload' => 'ex...',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'email',
                'payload' => 'ex...',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'logoLight',
                'payload' => 'upload/hCroUAekyY90Fj3WaoVsJpyuFAoHaz6RNS8NZRUf.png',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'logoDark',
                'payload' => 'upload/hCroUAekyY90Fj3WaoVsJpyuFAoHaz6RNS8NZRUf.png',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ];

        DB::table('settings')->insert($settings);
    }
}

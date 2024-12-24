<?php

namespace App\Helpers;

class JobDataHelper
{
    public static function updateOrCreateJobData(mixed $validatedData): array
    {
        return [
            'name' => $validatedData['name'],
            'position' => $validatedData['position'],
            'category_id' => $validatedData['category'],
            'type' => $validatedData['type'],
            'description' => $validatedData['description'],
            'vacancy' => $validatedData['vacancy'],
            'experience' => $validatedData['experience'],
            'deadline_for_filing' => $validatedData['deadlineForFiling'],
            'status' => $validatedData['status'] ?? 'hide',
            'company_id' => $validatedData['companyId'],
            'min_salary' => (int) str_replace('.', '', $validatedData['min']),
            'max_salary' => (int) str_replace('.', '', $validatedData['min']),
        ];
    }
}

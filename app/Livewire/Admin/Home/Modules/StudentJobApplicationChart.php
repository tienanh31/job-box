<?php

namespace App\Livewire\Admin\Home\Modules;

use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;
use Livewire\Component;

class StudentJobApplicationChart extends Component
{
    public function getStudentsByCourseWithStatus($status): Collection
    {
        return DB::table('users')
            ->join('profiles', function ($join) {
                $join->on('users.id', '=', 'profiles.profileable_id')
                    ->where('profiles.profileable_type', '=', 'App\\Models\\User')
                    ->where('profiles.type', 'Student');
            })
            ->join('applications', 'users.id', '=', 'applications.student_id')
            ->select(DB::raw('payload->"$.course" as course'), DB::raw('COUNT(DISTINCT profiles.id) as total_students'))
            ->where('applications.status', $status)
            ->groupBy('course')
            ->orderBy('course')
            ->get();
    }

    public function render(): View
    {
        $acceptedStudents = $this->getStudentsByCourseWithStatus('accepted');
        $rejectedStudents = $this->getStudentsByCourseWithStatus('rejected');

        $acceptedStudentJobCounts = $acceptedStudents->pluck('total_students')->toArray();
        $acceptedStudentJobLabels = $acceptedStudents->pluck('course')->map(fn ($label) => str_replace('"', '', $label))->toArray();

        $rejectedStudentJobCounts = $rejectedStudents->pluck('total_students')->toArray();
        $rejectedStudentJobLabels = $rejectedStudents->pluck('course')->map(fn ($label) => str_replace('"', '', $label))->toArray();

        return view('livewire.admin.home.modules.student-job-application-chart', [
            'acceptedStudentJobCounts' => $acceptedStudentJobCounts,
            'acceptedStudentJobLabels' => $acceptedStudentJobLabels,
            'rejectedStudentJobCounts' => $rejectedStudentJobCounts,
            'rejectedStudentJobLabels' => $rejectedStudentJobLabels,
        ]);
    }
}

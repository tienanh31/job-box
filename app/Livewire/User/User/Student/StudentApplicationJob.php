<?php

namespace App\Livewire\User\User\Student;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;
use Livewire\WithPagination;

#[Title('Danh Sách Các Việc Đã Ứng Tuyển')]
class StudentApplicationJob extends Component
{
    use WithPagination;

    public int $itemPerPage = 10;

    #[Layout('layouts.user')]
    public function render(): View
    {
        $user = User::with('applications')
            ->find(Auth::id());

        $jobs = $user->applications()
            ->with('company')
            ->paginate($this->itemPerPage);

        return view('livewire.user.user.student.student-application-job', [
            'jobs' => $jobs,
        ]);
    }
}

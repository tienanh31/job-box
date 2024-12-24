<?php

namespace App\Livewire\User\Student;

use App\Models\User;
use Illuminate\View\View;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;
use Livewire\WithPagination;

#[Title('Danh Sách Ứng Cử Viên')]
class StudentList extends Component
{
    use WithPagination;

    public int $itemPerPage = 10;

    #[Layout('layouts.user')]
    public function render(): View
    {
        $students = User::whereHas('roles', function ($query) {
            $query->where('name', 'Student');
        })->whereHas('studentProfile', function ($query) {
            $query->whereJsonContains('payload->allowPublishing', 'publish');
        })
            ->with(['studentProfile', 'avatar'])
            ->paginate($this->itemPerPage);

        return view('livewire.user.student.student-list', [
            'students' => $students,
        ]);
    }
}

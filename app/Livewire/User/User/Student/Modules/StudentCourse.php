<?php

namespace App\Livewire\User\User\Student\Modules;

use App\Livewire\User\User\Student\StudentResume;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Attributes\Validate;
use Livewire\Component;

class StudentCourse extends Component
{
    use LivewireAlert;

    public mixed $user;

    #[Validate('required|string|max:255')]
    public string $name;

    #[Validate('required|string|max:255')]
    public string $organization;

    #[Validate('required|date_format:Y-m-d|before_or_equal:today')]
    public string $startAt;

    #[Validate('required|date_format:Y-m-d|after_or_equal:startAt')]
    public string $endAt;

    #[Validate('required|string|max:1024')]
    public string $description;

    public function mount(): void
    {
        if (!Auth::check()) {
            $this->redirect(StudentResume::class, navigate: true);
        }
    }

    public function saveCourse(): void
    {
        $validatedData = $this->validate();

        $user = Auth::user();
        $user->courses()->create([
            'name' => $validatedData['name'],
            'organization' => $validatedData['organization'],
            'start_at' => $validatedData['startAt'],
            'end_at' => $validatedData['endAt'],
            'description' => $validatedData['description'],
        ]);

        $this->alert('success', trans('Create success!'));
        $this->reset();
        $this->dispatch('hiddenModal');
        $this->dispatch('refresh');
    }

    public function render(): View
    {
        return view('livewire.user.user.student.modules.student-course');
    }
}

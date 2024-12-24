<?php

namespace App\Livewire\User\User\Student\Modules;

use App\Livewire\User\User\Student\StudentResume;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Attributes\Validate;
use Livewire\Component;

class StudentProject extends Component
{
    use LivewireAlert;

    public mixed $user;

    public mixed $toggle = null;

    #[Validate('required|string|max:255')]
    public string $name;

    #[Validate('required|string|max:255')]
    public string $customer;

    #[Validate('required|int')]
    public int $numberOfMembers;

    #[Validate('required|string|max:255')]
    public string $technology;

    #[Validate('required|date_format:Y-m-d|before_or_equal:today')]
    public string $startAt;

    #[Validate('nullable|date_format:Y-m-d|after_or_equal:startAt')]
    public string $endAt;

    #[Validate('required|string|max:1024')]
    public string $description;

    #[Validate('required|string')]
    public string $position;

    public function updatedToggle(): void
    {
        $this->reset('endAt');
    }

    public function mount(): void
    {
        if (!Auth::check()) {
            $this->redirect(StudentResume::class, navigate: true);
        }
    }

    public function saveProject(): void
    {
        $validatedData = $this->validate();

        $user = Auth::user();
        $user->projects()->create([
            'name' => $validatedData['name'],
            'customer' => $validatedData['customer'],
            'number_of_members' => $validatedData['numberOfMembers'],
            'position' => $validatedData['position'],
            'technology' => $validatedData['technology'],
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
        return view('livewire.user.user.student.modules.student-project');
    }
}

<?php

namespace App\Livewire\User\User\Student\Modules;

use App\Livewire\User\User\Student\StudentResume;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Attributes\Validate;
use Livewire\Component;

class StudentSkill extends Component
{
    use LivewireAlert;

    public mixed $user;

    #[Validate('required|string|max:255')]
    public string $name;

    #[Validate('nullable|string|max:1024')]
    public string $description;

    public function mount(): void
    {
        if (!Auth::check()) {
            $this->redirect(StudentResume::class, navigate: true);
        }
    }

    public function saveSkill(): void
    {
        $validatedData = $this->validate();

        $user = Auth::user();
        $user->skills()->create([
            'name' => $validatedData['name'],
            'description' => $validatedData['description'],
        ]);

        $this->alert('success', trans('Create success!'));
        $this->reset();
        $this->dispatch('hiddenModal');
        $this->dispatch('refresh');
    }

    public function render(): View
    {
        return view('livewire.user.user.student.modules.student-skill');
    }
}

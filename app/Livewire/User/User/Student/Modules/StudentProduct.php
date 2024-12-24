<?php

namespace App\Livewire\User\User\Student\Modules;

use App\Livewire\User\User\Student\StudentResume;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Attributes\Validate;
use Livewire\Component;

class StudentProduct extends Component
{
    use LivewireAlert;

    public mixed $user;

    #[Validate('required|string|max:255')]
    public string $name;

    #[Validate('required|string|max:255')]
    public string $type;

    #[Validate('required|date_format:Y-m-d|before_or_equal:today')]
    public string $completionTime;

    #[Validate('required|string|max:1024')]
    public string $description;

    public function mount(): void
    {
        if (!Auth::check()) {
            $this->redirect(StudentResume::class, navigate: true);
        }
    }

    public function saveProduct(): void
    {
        $validatedData = $this->validate();

        $user = Auth::user();
        $user->products()->create([
            'name' => $validatedData['name'],
            'type' => $validatedData['type'],
            'completion_time' => $validatedData['completionTime'],
            'description' => $validatedData['description'],
        ]);

        $this->alert('success', trans('Create success!'));
        $this->reset();
        $this->dispatch('hiddenModal');
        $this->dispatch('refresh');
    }

    public function render(): View
    {
        return view('livewire.user.user.student.modules.student-product');
    }
}

<?php

namespace App\Livewire\User\User\Student\Modules;

use App\Livewire\User\User\Student\StudentResume;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Attributes\Validate;
use Livewire\Component;

class StudentCertificate extends Component
{
    use LivewireAlert;

    public mixed $user;

    public mixed $toggle = null;

    #[Validate('required|string|max:255')]
    public string $name;

    #[Validate('required|string|max:255')]
    public string $organization;

    #[Validate('required|date_format:Y-m-d|before_or_equal:today')]
    public string $issuedOn;

    #[Validate('nullable|date_format:Y-m-d|after_or_equal:issuedOn')]
    public string $expiresOn;

    public function updatedToggle(): void
    {
        $this->reset('expiresOn');
    }

    public function mount(): void
    {
        if (!Auth::check()) {
            $this->redirect(StudentResume::class, navigate: true);
        }
    }

    public function saveCertificate(): void
    {
        $validatedData = $this->validate();

        $user = Auth::user();
        $user->certificates()->create([
            'name' => $validatedData['name'],
            'organization' => $validatedData['organization'],
            'issued_on' => $validatedData['issuedOn'],
            'expires_on' => $validatedData['expiresOn'],
        ]);

        $this->alert('success', trans('Create success!'));
        $this->reset();
        $this->dispatch('hiddenModal');
        $this->dispatch('refresh');
    }

    public function render(): View
    {
        return view('livewire.user.user.student.modules.student-certificate');
    }
}

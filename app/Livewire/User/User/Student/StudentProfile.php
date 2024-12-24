<?php

namespace App\Livewire\User\User\Student;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Attributes\Layout;
use Livewire\Attributes\On;
use Livewire\Attributes\Title;
use Livewire\Component;

#[Title('Trang Cá Nhân')]
class StudentProfile extends Component
{
    use LivewireAlert;

    public int $step = 1;

    public string $firstName;

    public string $lastName;

    public string $studentId;

    public string $major;

    public string $course;

    public string $email;

    public string $phone;

    public string $career;

    public string $appliedPosition;

    public string $allowPublishing;

    public mixed $data;

    public function mount(): void
    {
        if ($user = Auth::user()->studentProfile) {
            $userData = $user->payload;
            $this->email = $userData['email'];
            $this->firstName = $userData['firstName'] ?? '';
            $this->lastName = $userData['lastName'];
            $this->major = $userData['major'];
            $this->course = $userData['course'];
            $this->phone = $userData['phone'];
            $this->studentId = $userData['studentId'];
            $this->appliedPosition = $userData['appliedPosition'];
            $this->career = $userData['career'] ?? '';
            $this->allowPublishing = $userData['allowPublishing'];
        }
    }

    public function validateStep(int $step): bool
    {
        switch ($step) {
            case 1:
                $validatedData = $this->validate([
                    'firstName' => 'required|string|max:32',
                    'lastName' => 'required|string|min:2|max:32',
                    'studentId' => ['required', 'string', 'min:2', 'max:8', 'starts_with:B,C,b,c'],
                    'major' => 'required|string|min:2|max:32',
                    'course' => ['required', 'string', 'min:2', 'max:32', 'starts_with:K,k'],
                ]);
                break;

            case 2:
                $validatedData = $this->validate([
                    'email' => 'required|email',
                    'phone' => ['required', 'regex:/^(0?)(3[2-9]|5[6|8|9]|7[0|6-9]|8[0-6|8|9]|9[0-4|6-9])[0-9]{7}$/'],
                    'career' => 'nullable|string',
                    'appliedPosition' => 'required|string|max:50',
                    'allowPublishing' => 'required|in:publish,unPublish',
                ]);
                break;

            default:
                return false;
        }

        if (!empty($validatedData)) {
            $this->data[$step] = $validatedData;
        }

        return !empty($validatedData);
    }

    public function updateStep(bool $isNext): void
    {
        if ($isNext) {
            if ($this->validateStep($this->step)) {
                $this->step = min($this->step + 1, 4);
            }

            return;
        }
        $this->step = max($this->step - 1, 1);
    }

    public function saveProfile(): void
    {
        $user = User::findOrFail(Auth::id());

        $data = array_reduce($this->data, 'array_merge', []);

        $user->studentProfile()->updateOrCreate([], [
            'payload' => $data,
            'type' => 'Student',
        ]);

        $this->alert('success', 'Create Success');
        $this->redirect(StudentResume::class, navigate: true);
    }

    #[On('refresh')]
    #[Layout('layouts.user')]
    public function render(): View
    {
        return view('livewire.user.user.student.student-profile');
    }
}

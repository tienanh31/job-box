<?php

namespace App\Livewire\User\User\Company;

use App\Livewire\User\User\Company\Job\JobList;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Attributes\Layout;
use Livewire\Attributes\On;
use Livewire\Attributes\Title;
use Livewire\Attributes\Validate;
use Livewire\Component;

#[Title('Trang Cá Nhân')]
class CompanyProfile extends Component
{
    use LivewireAlert;

    #[Validate('required|string|max:50')]
    public string $name;

    #[Validate('required|email')]
    public string $email;

    #[Validate('required|numeric')]
    public string $phone;

    #[Validate('required')]
    public string $description;

    #[Validate('required|numeric')]
    public string $founded;

    #[Validate('required|string')]
    public string $headquarters;

    #[Validate('required|numeric')]
    public int $numberOfEmployee;

    public int $step = 1;

    public mixed $data;

    public function mount(): void
    {
        if ($user = Auth::user()->companyProfile) {
            $userData = $user->payload;
            $this->name = $userData['name'];
            $this->email = $userData['email'] ?? '';
            $this->phone = $userData['phone'];
            $this->founded = $userData['founded'];
            $this->description = $userData['description'];
            $this->headquarters = $userData['headquarters'];
            $this->numberOfEmployee = $userData['numberOfEmployee'];
        }
    }

    public function validateStep(int $step): bool
    {
        switch ($step) {
            case 1:
                $validatedData = $this->validate([
                    'name' => 'required|string|max:50',
                    'email' => 'required|email',
                    'phone' => ['required', 'regex:/^(0?)(3[2-9]|5[6|8|9]|7[0|6-9]|8[0-6|8|9]|9[0-4|6-9])[0-9]{7}$/'],
                    'founded' => 'required|numeric',
                ]);
                break;

            case 2:
                $validatedData = $this->validate([
                    'description' => 'required',
                    'headquarters' => 'required|string',
                    'numberOfEmployee' => 'required|numeric',
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

        $user->companyProfile()->updateOrCreate([], [
            'payload' => $data,
            'type' => 'Company',
        ]);

        $this->alert('success', trans('Create Success'));
        $this->redirect(JobList::class, navigate: true);
    }

    #[On('refresh')]
    #[Layout('layouts.user')]
    public function render(): View
    {
        return view('livewire.user.user.company.company-profile');
    }
}

<?php

namespace App\Livewire\User\User\Student\Modules;

use App\Livewire\User\User\Student\StudentResume;
use App\Models\District;
use App\Models\Province;
use App\Models\Ward;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Attributes\Validate;
use Livewire\Component;

class StudentAddress extends Component
{
    use LivewireAlert;

    #[Validate('nullable|string|max:255')]
    public string $houseNumber = '';

    #[Validate('required|integer')]
    public string|null $provinceId;

    public mixed $districts = [];

    #[Validate('required|integer')]
    public string|null $districtId;

    public mixed $wards = [];

    #[Validate('required')]
    public string|null $wardId;

    public function mount(): void
    {
        if (!Auth::check()) {
            $this->redirect(StudentResume::class, navigate: true);
        }
    }

    public function saveAddress(): void
    {
        $validatedData = $this->validate();

        $user = Auth::user();
        $user->addresses()->create([
            'name' => $validatedData['houseNumber'],
            'province_id' => $validatedData['provinceId'],
            'district_id' => $validatedData['districtId'],
            'ward_id' => $validatedData['wardId'],
        ]);

        $this->alert('success', trans('Create success!'));
        $this->reset();
        $this->dispatch('hiddenModal');
        $this->dispatch('refresh');
    }

    public function render(): View
    {
        $provinces = Province::all();

        if (!empty($this->provinceId)) {
            $this->districts = $districts =  District::where('province_id', $this->provinceId)->get();
        }

        if (!empty($this->districtId)) {
            $this->wards = Ward::where('district_id', $this->districtId)->get();
        }

        return view('livewire.user.user.student.modules.student-address', [
            'provinces' => $provinces,
        ]);
    }
}

<?php

namespace App\Livewire\Admin\Job;

use App\Helpers\BaseHelper;
use App\Helpers\JobDataHelper;
use App\Models\Address;
use App\Models\Category;
use App\Models\District;
use App\Models\Job;
use App\Models\Province;
use App\Models\User;
use App\Models\Ward;
use Illuminate\View\View;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Attributes\Layout;
use Livewire\Attributes\On;
use Livewire\Attributes\Validate;
use Livewire\Component;

class JobEdit extends Component
{
    use LivewireAlert;

    #[Validate('nullable|required_with:districtId,wardId')]
    public string|null $provinceId;

    public mixed $districts = [];

    #[Validate('required_with:provinceId')]
    public string|null $districtId;

    public mixed $wards = [];

    #[Validate('required_with:districtId')]
    public string|null $wardId;

    #[Validate('required_with:provinceId|max:255|numeric|nullable')]
    public string $longitude;

    #[Validate('required_with:provinceId|max:255|numeric|nullable')]
    public string $latitude;

    #[Validate('required|string|max:125')]
    public string $name;

    #[Validate('required|string|max:50')]
    public string $position;

    #[Validate('required|integer')]
    public string $category;

    #[Validate('required|string|in:Full Time,Part Time,Freelance,Internship')]
    public string $type;

    #[Validate('required|min:30|string')]
    public string $description;

    #[Validate('required|integer')]
    public string $vacancy;

    #[Validate('required|string|in:0,1,2,3,more')]
    public string $experience;

    #[Validate('required|date_format:Y-m-d|after_or_equal:today')]
    public string $deadlineForFiling;

    #[Validate('required')]
    public string $min;

    #[Validate('nullable|gte:min')]
    public string $max;

    #[Validate('nullable|string|in:show,hide')]
    public string $status;

    public mixed $addresses = [];

    public mixed $job;

    #[Validate('required')]
    public mixed $companyId;

    public function mount(string|int $id): void
    {
        $job = Job::with(['company', 'addresses.province', 'addresses.district', 'addresses.ward'])
            ->findOrFail($id);

        $this->job = $job;
        $this->name = $job->name;
        $this->position = $job->position;
        $this->category = $job->category_id;
        $this->type = $job->type;
        $this->description = $job->description;
        $this->vacancy = $job->vacancy;
        $this->experience = $job->experience;
        $this->deadlineForFiling = $job->deadline_for_filing;
        $this->status = $job->status;
        $this->min = $job->min_salary;
        $this->max = $job->max_salary;
        $this->addresses = $job->addresses;
        $this->companyName = $job->company->name;
        $this->companyId = $job->company_id;
    }

    public function updateJob(): void
    {
        $validatedData = $this->validate();

        $jobData = JobDataHelper::updateOrCreateJobData($validatedData);

        $this->job->update($jobData);

        if ($validatedData['provinceId']) {
            $this->job->addresses()->create([
                'province_id' => $validatedData['provinceId'],
                'district_id' => $validatedData['districtId'],
                'ward_id' => $validatedData['wardId'],
                'longitude' => $validatedData['longitude'],
                'latitude' => $validatedData['latitude'],
            ]);
        }

        $this->alert('success', trans('Update success'));
        $this->redirect(JobList::class, navigate: true);
    }

    public function deleteAddress(string|int $id): void
    {
        if ($this->job->addresses->count() > 1) {
            Address::findOrFail($id)->delete();
            $this->addresses = $this->job->addresses()->get();
            $this->alert('success', trans('Delete success'));
            $this->dispatch('refresh');
            return;
        }

        $this->alert('warning', trans('Can not delete all addresses'));
    }

    #[On('refresh')]
    #[Layout('layouts.admin')]
    public function render(): View
    {
        BaseHelper::setPageTitle(trans('Edit Job'), trans('Jobs'));

        $categories = Category::orderByDesc('created_at')->get();

        $provinces = Province::all();

        if (!empty($this->provinceId)) {
            $this->districts = District::where('province_id', $this->provinceId)->get();
        }

        if (!empty($this->districtId)) {
            $this->wards = Ward::where('district_id', $this->districtId)->get();
        }

        $companies = User::whereHas('roles', function ($query) {
            $query->where('name', 'Company');
        })->whereHas('companyProfile')
            ->get();

        return view('livewire.admin.job.job-edit', [
            'categories' => $categories,
            'provinces' => $provinces,
            'companies' => $companies,
        ]);
    }
}

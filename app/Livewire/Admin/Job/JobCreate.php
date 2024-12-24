<?php

namespace App\Livewire\Admin\Job;

use App\Helpers\BaseHelper;
use App\Helpers\JobDataHelper;
use App\Livewire\Admin\Category\CategoryList;
use App\Models\Category;
use App\Models\District;
use App\Models\Job;
use App\Models\Province;
use App\Models\User;
use App\Models\Ward;
use Illuminate\View\View;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Attributes\Validate;
use Livewire\Component;

#[Title('Create New Job')]
class JobCreate extends Component
{
    use LivewireAlert;

    #[Validate('required|required_with:districtId,wardId')]
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

    #[Validate('nullable')]
    public string $min;

    #[Validate('nullable|gte:min')]
    public string $max;

    #[Validate('required|string|in:show,hide')]
    public string $status;

    #[Validate('required')]
    public mixed $companyId;

    public function mount(): void
    {
        if (!Category::count()) {
            $this->alert('warning', trans('Please add category first'));
            $this->redirect(CategoryList::class, navigate: true);
        }
    }

    public function saveJob(): void
    {
        $validatedData = $this->validate();

        $jobData = JobDataHelper::updateOrCreateJobData($validatedData);

        $job = Job::create($jobData);

        if ($validatedData['provinceId']) {
            $job->addresses()->create([
                'province_id' => $validatedData['provinceId'],
                'district_id' => $validatedData['districtId'],
                'ward_id' => $validatedData['wardId'],
                'longitude' => $validatedData['longitude'],
                'latitude' => $validatedData['latitude'],
            ]);
        }

        $this->alert('success', trans('Create success'));
        $this->dispatch('refresh');
        $this->redirect(JobList::class, navigate: true);
    }

    #[Layout('layouts.admin')]
    public function render(): View
    {
        BaseHelper::setPageTitle(trans('Create Job'), trans('Jobs'));

        $categories = Category::orderByDesc('created_at')
            ->get();

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

        return view('livewire.admin.job.job-create', [
            'categories' => $categories,
            'provinces' => $provinces,
            'companies' => $companies,
        ]);
    }
}

<?php

namespace App\Livewire\User\User\Company\Job;

use App\Events\CompanyJobCreateEvent;
use App\Helpers\JobDataHelper;
use App\Livewire\User\User\Company\CompanyProfile;
use App\Models\Category;
use App\Models\District;
use App\Models\Job;
use App\Models\Province;
use App\Models\Ward;
use App\Notifications\CompanyJobCreateNotification;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Notification;
use Illuminate\View\View;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Validate;
use Livewire\Component;
use Telegram\Bot\Laravel\Facades\Telegram;

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

    public function mount(): void
    {
        if (!Auth::user()->companyProfile) {
            $this->redirect(CompanyProfile::class, navigate: true);
        }

        if (!Category::count()) {
            $this->alert('warning', trans('Please wait for the admin to add more categories'));
            $this->redirect(JobList::class, navigate: true);
        }
    }

    public function saveJob(): void
    {
        $validatedData = $this->validate();
        $validatedData['companyId'] = Auth::id();

        $jobData = JobDataHelper::updateOrCreateJobData($validatedData);

        $job = Job::create($jobData);

        $textMessage = trans(':job has been created! 🔔', ['job' => $job->name]);

        Telegram::sendMessage([
            'chat_id' => env('TELEGRAM_GROUP_ID'),
            'parse_mode' => 'HTML',
            'text' => $textMessage
        ]);

        if ($validatedData['provinceId']) {
            $job->addresses()->create([
                'province_id' => $validatedData['provinceId'],
                'district_id' => $validatedData['districtId'],
                'ward_id' => $validatedData['wardId'],
                'longitude' => $validatedData['longitude'],
                'latitude' => $validatedData['latitude'],
            ]);
        }

        Notification::send(Auth::user(), new CompanyJobCreateNotification($job));
        broadcast(new CompanyJobCreateEvent(trans('A new job has been added: (:name)!', ['name' => $job->name])));
        $this->alert('success', trans('Create success'));
        $this->dispatch('refresh');
        $this->redirect(JobList::class, navigate: true);
    }

    #[Layout('layouts.user')]
    public function render(): View
    {
        $categories = Category::orderByDesc('created_at')
            ->get();

        $provinces = Province::all();

        if (!empty($this->provinceId)) {
            $this->districts = District::where('province_id', $this->provinceId)->get();
        }

        if (!empty($this->districtId)) {
            $this->wards = Ward::where('district_id', $this->districtId)->get();
        }

        return view('livewire.user.user.company.job.job-create', [
            'categories' => $categories,
            'provinces' => $provinces,
        ]);
    }
}

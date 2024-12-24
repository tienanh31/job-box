<?php

namespace App\Livewire\User\Job;

use App\Events\StudentJobApplyEvent;
use App\Livewire\User\Home\HomePage;
use App\Livewire\User\User\Student\StudentProfile;
use App\Mail\ApplyJob;
use App\Notifications\StudentJobApplyNotification;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Notification;
use Illuminate\View\View;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Attributes\Validate;
use Livewire\Component;
use Livewire\WithFileUploads;
use App\Models\Job;

#[Title('Nộp Hồ Sơ')]
class JobApplication extends Component
{
    use WithFileUploads;
    use LivewireAlert;

    #[Validate('required|file|mimes:pdf,docx,doc|max:4096')]
    public mixed $resume = '';

    public mixed $fileName;

    #[Validate('required|string|max:2048')]
    public string $presentation;

    public mixed $job;

    public function mount(string|int $id): void
    {
        $job = Job::findOrFail($id);

        $this->job = $job;

        if (!Auth::user()->studentProfile()->count()) {
            $this->alert('warning', trans('Completed your profile before apply job'));
            $this->redirect(StudentProfile::class, navigate: true);
        }
    }

    public function applyJob(): void
    {
        $validatedData = $this->validate();
        $user = Auth::user();
        $jobId = $this->job->id;

        if (!$user->applications()->wherePivot('job_id', $jobId)->exists()) {
            $user->applications()->attach($jobId, [
                'status' => 'pending',
                'presentation' => $validatedData['presentation'],
            ]);

            $fileName = $validatedData['resume']->getClientOriginalName();
            $filePath = $validatedData['resume']->getRealPath();

            $mailData = [
                'email' => $user->studentProfile->payload['email'],
                'companyName' => $this->job->company->companyProfile->payload['name'],
                'subject' => trans('Job Application for :jobTitle', ['jobTitle' => $this->job->name]),
                'presentation' => $validatedData['presentation'],
                'filePath' => $filePath,
                'fileName' => $fileName,
            ];

            Notification::send(Auth::user(), new StudentJobApplyNotification($this->job));
            Mail::to($this->job->company->email)->send(new ApplyJob($mailData));
            broadcast(new StudentJobApplyEvent(trans('New application has been created!')));
            $this->alert('success', trans('Apply Success'));
            $this->redirect(HomePage::class, navigate: true);
            return;
        }

        $this->alert('warning', trans('You have previously submitted your application for this position, please wait for a response'));
    }

    #[Layout('layouts.user')]
    public function render(): View
    {
        return view('livewire.user.job.job-application');
    }
}

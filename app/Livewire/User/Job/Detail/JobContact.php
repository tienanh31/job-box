<?php

namespace App\Livewire\User\Job\Detail;

use App\Mail\ContactJob;
use App\Models\Job;
use Illuminate\Support\Facades\Mail;
use Illuminate\View\View;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Attributes\Validate;
use Livewire\Component;

class JobContact extends Component
{
    use LivewireAlert;

    #[Validate('required|string|max:32')]
    public string $name;

    #[Validate('required|string|email')]
    public string $email;

    #[Validate('required|max:255')]
    public string $subject;

    #[Validate('required|string')]
    public string $message;

    public mixed $jobId;

    public function sendContact(): void
    {
        $validatedData = $this->validate();

        $job = Job::where('id', $this->jobId)
            ->with('company')
            ->first();

        $mailData = array_merge(['companyName' => $job->company->name], $validatedData);

        Mail::to($job->company->email)
            ->send(new ContactJob($mailData));
        $this->alert('success', trans('Send email success'));
        $this->reset();
    }

    public function render(): View
    {
        return view('livewire.user.job.detail.job-contact');
    }
}

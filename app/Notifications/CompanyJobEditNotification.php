<?php

namespace App\Notifications;

use App\Models\Job;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class CompanyJobEditNotification extends Notification
{
    use Queueable;

    protected Job $job;

    public function __construct(Job $job)
    {
        $this->job = $job;
    }

    public function via(): array
    {
        return ['database', 'mail'];
    }

    public function toMail(): MailMessage
    {
        return (new MailMessage())
            ->line(trans('Your job has been updated: (:name)!', ['name' => $this->job->name]))
            ->line('Thank you for using our application!');
    }

    public function toArray(): array
    {
        return $this->job->toArray();
    }
}

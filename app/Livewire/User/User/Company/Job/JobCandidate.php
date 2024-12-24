<?php

namespace App\Livewire\User\User\Company\Job;

use Illuminate\Support\Collection;
use Illuminate\View\View;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Attributes\On;
use Livewire\Component;
use Telegram\Bot\Laravel\Facades\Telegram;

class JobCandidate extends Component
{
    use LivewireAlert;

    public mixed $job;

    public mixed $applicants;

    public mixed $applications;

    public array $statuses = [];

    public ?int $currentPage = 1;

    public int $perPage = 10;

    #[On('refresh')]
    public function mount(): void
    {
        $this->applications = $this->job->applications;
        $this->applicants = $this->paginateApplicants();

        foreach ($this->applicants as $applicant) {
            $this->statuses[$applicant->id] = $applicant->pivot->status;
        }
    }

    protected function paginateApplicants(): Collection
    {
        $offset = ($this->currentPage - 1) * $this->perPage;
        return $this->applications
            ->skip($offset)
            ->take($this->perPage);
    }

    public function nextPage(): void
    {
        $this->currentPage++;
        $this->applicants = $this->paginateApplicants();
        $this->dispatch('refresh');
    }

    public function previousPage(): void
    {
        if ($this->currentPage > 1) {
            $this->currentPage--;
            $this->applicants = $this->paginateApplicants();
            $this->dispatch('refresh');
        }
    }

    public function updateStatus(string|int $id): void
    {
        $newStatus = $this->statuses[$id] ?? 'pending';
        $this->job->applications()->updateExistingPivot($id, ['status' => $newStatus], false);
        $textMessage = trans(':job has been updated! 🔔', ['job' => $this->job->name]);

        Telegram::sendMessage([
            'chat_id' => env('TELEGRAM_GROUP_ID'),
            'parse_mode' => 'HTML',
            'text' => $textMessage
        ]);
        $this->alert('success', trans('Update success'));
        $this->dispatch('refresh');
    }

    public function render(): View
    {
        return view('livewire.user.user.company.job.job-candidate');
    }
}

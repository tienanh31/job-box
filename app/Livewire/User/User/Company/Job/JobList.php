<?php

namespace App\Livewire\User\User\Company\Job;

use App\Livewire\User\User\Company\CompanyProfile;
use App\Models\Job;
use App\Traits\AuthorizesRoleOrPermission;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Attributes\Layout;
use Livewire\Attributes\On;
use Livewire\Attributes\Title;
use Livewire\Component;
use Livewire\WithPagination;

#[Title('Danh Sách Việc Làm')]
class JobList extends Component
{
    use WithPagination;
    use LivewireAlert;
    use AuthorizesRoleOrPermission;

    public string $searchTerm = '';

    public int $itemPerPage = 20;

    public mixed $job;

    public function mount(): void
    {
        if (!Auth::user()->companyProfile) {
            $this->redirect(CompanyProfile::class, navigate: true);
        }
    }

    public function deleteJob(string|int $id): void
    {
        $this->authorizeRoleOrPermission('company-job-delete');
        $job = Job::findOrFail($id);
        $job->delete();
        $this->alert('success', trans('Delete success :name', ['name' => $job->name]));
        $this->dispatch('refresh');
    }

    #[On('refresh')]
    #[Layout('layouts.user')]
    public function render(): View
    {
        $searchTerm = '%' . $this->searchTerm . '%';
        $jobs = Job::where('company_id', Auth::id())
            ->where(function ($query) use ($searchTerm) {
                $query->where('name', 'like', $searchTerm)
                    ->orWhere('description', 'like', $searchTerm);
            })
            ->orderByDesc('created_at')
            ->paginate($this->itemPerPage);

        return view('livewire.user.user.company.job.job-list', [
            'jobs' => $jobs,
        ]);
    }
}

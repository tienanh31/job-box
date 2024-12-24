<?php

namespace App\Livewire\Admin\Job;

use App\Helpers\BaseHelper;
use App\Models\Job;
use App\Traits\AuthorizesRoleOrPermission;
use Illuminate\View\View;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Attributes\Layout;
use Livewire\Attributes\On;
use Livewire\Attributes\Title;
use Livewire\Component;
use Livewire\WithPagination;

#[Title('List Of Jobs')]
class JobList extends Component
{
    use WithPagination;
    use LivewireAlert;
    use AuthorizesRoleOrPermission;

    public string $searchTerm = '';

    public int $itemPerPage = 20;

    public mixed $job;

    public string $filterType = 'all';

    public function filterByType(string $type): void
    {
        $this->filterType = $type;
    }

    public function deleteJob(string|int $id): void
    {
        $this->authorizeRoleOrPermission('job-delete');
        $job = Job::findOrFail($id);
        $job->delete();
        $this->alert('success', trans('Delete success :name', ['name' => $job->name]));
        $this->dispatch('refresh');
    }

    public function updatedSearchTerm(): void
    {
        $this->resetPage();
    }

    #[On('refresh')]
    #[Layout('layouts.admin')]
    public function render(): View
    {
        BaseHelper::setPageTitle(trans('List Of Jobs'), trans('Jobs'));

        $searchTerm = '%' . $this->searchTerm . '%';
        $jobs = Job::where(function ($query) use ($searchTerm) {
            $query->where('name', 'like', $searchTerm)
                ->orWhere('description', 'like', $searchTerm);
        })
            ->when($this->filterType == 'show', fn ($query) => $query->where('status', 'show'))
            ->when($this->filterType == 'hide', fn ($query) => $query->where('status', 'hide'))
            ->orderByDesc('created_at')
            ->paginate($this->itemPerPage);

        $countJobs = Job::selectRaw('status, COUNT(*) as count')
            ->groupBy('status')
            ->get()
            ->pluck('count', 'status');

        $totalJobs = $countJobs->sum();
        $publishedJobs = $countJobs->get('show', 0);
        $hiddenJobs = $countJobs->get('hide', 0);

        return view('livewire.admin.job.job-list', [
            'jobs' => $jobs,
            'totalJobs' => $totalJobs,
            'publishedJobs' => $publishedJobs,
            'hiddenJobs' => $hiddenJobs,
        ]);
    }
}

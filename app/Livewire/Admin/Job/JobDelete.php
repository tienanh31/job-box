<?php

namespace App\Livewire\Admin\Job;

use App\Helpers\BaseHelper;
use App\Models\Job;
use Illuminate\View\View;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;
use Livewire\WithPagination;

#[Title('List Of Deleted Jobs')]
class JobDelete extends Component
{
    use WithPagination;
    use LivewireAlert;

    public string $searchTerm = '';

    public int $itemPerPage = 20;

    public function deleteJob(string|int $id): void
    {
        $job = Job::onlyTrashed()->findOrFail($id);
        $job->forceDelete();
        $this->alert('success', trans('Delete success :name', ['name' => $job->name]));
        $this->dispatch('refresh');
    }

    public function clearAll(): void
    {
        Job::onlyTrashed()->forceDelete();
        $this->alert('success', trans('Delete success'));
        $this->dispatch('refresh');
    }

    public function reverseJob(string|int $id): void
    {
        Job::onlyTrashed()
            ->find($id)
            ->restore();
        $this->alert('success', trans('Reverse success'));
        $this->dispatch('refresh');
    }

    #[Layout('layouts.admin')]
    public function render(): View
    {
        BaseHelper::setPageTitle(trans('List Of Deleted Jobs'), trans('Jobs'));

        $searchTerm = '%' . $this->searchTerm . '%';
        $jobs = Job::onlyTrashed()
            ->where(function ($query) use ($searchTerm) {
                $query->where('name', 'like', '%' . $searchTerm . '%')
                    ->orWhere('description', 'like', '%' . $searchTerm . '%');
            })
            ->orderByDesc('deleted_at')
            ->paginate($this->itemPerPage);

        return view('livewire.admin.job.job-delete', [
            'jobs' => $jobs,
        ]);
    }
}

<?php

namespace App\Livewire\User\Job;

use App\Models\Category;
use App\Models\Job;
use App\Traits\WordTrend;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\View\View;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Attributes\Url;
use Livewire\Component;
use Livewire\WithPagination;

#[Title('Danh Sách Việc Làm')]
class JobList extends Component
{
    use WithPagination;
    use WordTrend;

    public int $itemPerPage = 10;

    public mixed $categories = [];

    #[Url(history: true)]
    public mixed $searchTerm = '';

    public mixed $filterByCategory = [];

    public string $salaryMin = '';

    public string $salaryMax = '';

    public mixed $filterByType = [];

    public function mount(): void
    {
        $this->categories = Category::orderByDesc('created_at')
            ->withCount(['jobs' => function ($query) {
                $query->where('status', 'show');
            }])
            ->having('jobs_count', '>', 0)
            ->with('jobs')
            ->get();
    }

    private function queryFilterJob(): LengthAwarePaginator
    {
        if (!is_string($this->searchTerm)) {
            $this->searchTerm = 'Is Array';
        }

        $searchTerm = '%' . $this->searchTerm . '%';
        $salaryMin = is_numeric($this->salaryMin) ? (int) $this->salaryMin : null;
        $salaryMax = is_numeric($this->salaryMax) ? (int) $this->salaryMax : null;
        $this->createTrendingWords($this->searchTerm);

        $query = Job::where(function ($query) use ($searchTerm) {
            $query->where('name', 'like', $searchTerm)
                ->orWhere('description', 'like', $searchTerm)
                ->orWhere('position', 'like', $searchTerm);
        })
            ->where('status', 'show')
            ->when($this->filterByCategory, fn ($query) => $query->whereIn('category_id', $this->filterByCategory))
            ->when($this->filterByType, fn ($query) => $query->whereIn('type', $this->filterByType))
            ->when($salaryMin, fn ($query) => $query->where('min_salary', '>=', $salaryMin))
            ->when($salaryMax, fn ($query) => $query->where(fn ($query) => $query->where('max_salary', '<=', $salaryMax)));

        return $query->with('company')
            ->orderByDesc('created_at')
            ->paginate($this->itemPerPage);
    }

    public function updatedSearchTerm(): void
    {
        $this->resetPage();
    }

    public function updatedFilterByCategory(): void
    {
        $this->resetPage();
    }

    public function updatedFilterByType(): void
    {
        $this->resetPage();
    }

    public function updatedSalaryMax(): void
    {
        $this->resetPage();
    }

    public function updatedSalaryMin(): void
    {
        $this->resetPage();
    }

    #[Layout('layouts.user')]
    public function render(): View
    {
        $jobs = $this->queryFilterJob();

        return view('livewire.user.job.job-list', [
            'jobs' => $jobs,
        ]);
    }
}

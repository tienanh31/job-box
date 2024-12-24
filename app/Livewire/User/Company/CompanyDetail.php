<?php

namespace App\Livewire\User\Company;

use Illuminate\Support\Collection;
use Illuminate\View\View;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;
use Spatie\Permission\Models\Role;

#[Title('Chi Tiết Công Ty')]
class CompanyDetail extends Component
{
    public mixed $company;

    public mixed $jobs;

    public ?int $currentPage = 1;

    public int $perPage = 4;

    public function mount(string|int $id): void
    {
        $role = Role::where('name', 'company')->first();
        $this->company = $role->users()
            ->has('companyProfile')
            ->with('companyProfile', 'avatar')
            ->withCount('jobs')
            ->withSum('jobs', 'vacancy')
            ->findOrFail($id);
        $this->jobs = $this->paginateJobs();
    }

    public function nextPage(): void
    {
        $this->currentPage++;
        $this->jobs = $this->paginateJobs();
    }

    public function previousPage(): void
    {
        if ($this->currentPage > 1) {
            $this->currentPage--;
            $this->jobs = $this->paginateJobs();
        }
    }

    protected function paginateJobs(): Collection
    {
        $offset = ($this->currentPage - 1) * $this->perPage;
        return $this->company
            ->jobs()
            ->where('status', 'show')
            ->orderByDesc('created_at')
            ->skip($offset)
            ->take($this->perPage)
            ->get();
    }

    #[Layout('layouts.user')]
    public function render(): View
    {
        return view('livewire.user.company.company-detail');
    }
}

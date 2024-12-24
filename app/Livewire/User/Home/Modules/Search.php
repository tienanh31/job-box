<?php

namespace App\Livewire\User\Home\Modules;

use App\Models\Job;
use Illuminate\View\View;
use Livewire\Attributes\On;
use Livewire\Component;
use App\Traits\WordTrend;

class Search extends Component
{
    use WordTrend;

    public string $searchTerm;

    public mixed $jobs;

    public bool $showSuggestions;

    public function hideSuggestions(): void
    {
        $this->showSuggestions = false;
    }

    public function search(): void
    {
        if (!empty($this->searchTerm)) {
            $this->jobs = Job::getJobsLimit($this->searchTerm);

            $this->createTrendingWords($this->searchTerm);

            $this->dispatch('refresh');
            return;
        }

        $this->jobs = [];
        $this->dispatch('refresh');
    }

    public function updatedSearchTerm(): void
    {
        $this->showSuggestions = true;
        $this->search();
    }

    #[On('refresh')]
    public function render(): View
    {
        return view('livewire.user.home.modules.search');
    }
}

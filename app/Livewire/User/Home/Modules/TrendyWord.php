<?php

namespace App\Livewire\User\Home\Modules;

use App\Models\TrendingWord;
use Illuminate\View\View;
use Livewire\Attributes\On;
use Livewire\Component;

class TrendyWord extends Component
{
    public mixed $trendingWords = [];

    #[On('refresh')]
    public function mount(): void
    {
        $this->trendingWords = TrendingWord::orderByDesc('count')
        ->limit(7)
        ->get();
    }

    public function render(): View
    {
        return view('livewire.user.home.modules.trendy-word');
    }
}

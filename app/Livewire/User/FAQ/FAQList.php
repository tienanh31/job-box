<?php

namespace App\Livewire\User\FAQ;

use App\Models\FAQ;
use Illuminate\View\View;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;

#[Title('Các Câu Hỏi Thường Gặp')]
class FAQList extends Component
{
    #[Layout('layouts.user')]
    public function render(): View
    {
        $faqs = FAQ::orderBy('category_name')
            ->orderByDesc('created_at')
            ->get()
            ->groupBy('category_name');

        return view('livewire.user.faq.faq-list', [
            'faqs' => $faqs,
        ]);
    }
}

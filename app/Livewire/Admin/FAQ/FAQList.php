<?php

namespace App\Livewire\Admin\FAQ;

use App\Helpers\BaseHelper;
use App\Models\FAQ;
use App\Traits\AuthorizesRoleOrPermission;
use Illuminate\View\View;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Attributes\Layout;
use Livewire\Attributes\On;
use Livewire\Attributes\Title;
use Livewire\Component;
use Livewire\WithPagination;

#[Title('List Of FAQ')]
class FAQList extends Component
{
    use LivewireAlert;
    use WithPagination;
    use AuthorizesRoleOrPermission;

    public string $searchTerm = '';

    public int $itemPerPage = 10;

    public function deleteFAQ(string|int $id): void
    {
        $this->authorizeRoleOrPermission('faq-delete');

        $faq = FAQ::findOrFail($id);
        $faq->delete();
        $this->alert('success', trans('Delete success'));
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
        BaseHelper::setPageTitle(trans('FAQs'));
        $searchTerm = '%' . $this->searchTerm . '%';
        $faqs = FAQ::where(function ($query) use ($searchTerm) {
            $query->where('answer', 'like', $searchTerm)
                ->orWhere('question', 'like', $searchTerm);
        })
            ->orderByDesc('created_at')
            ->paginate($this->itemPerPage);

        return view('livewire.admin.faq.faq-list', [
            'faqs' => $faqs,
        ]);
    }
}

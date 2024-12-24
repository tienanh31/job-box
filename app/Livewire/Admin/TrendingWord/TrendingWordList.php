<?php

namespace App\Livewire\Admin\TrendingWord;

use App\Helpers\BaseHelper;
use App\Models\TrendingWord;
use App\Traits\AuthorizesRoleOrPermission;
use Illuminate\View\View;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Attributes\Layout;
use Livewire\Attributes\On;
use Livewire\Attributes\Title;
use Livewire\Component;
use Livewire\WithPagination;

#[Title('List Of Trending Words')]
class TrendingWordList extends Component
{
    use LivewireAlert;
    use WithPagination;
    use AuthorizesRoleOrPermission;

    public int $itemPerPage = 20;

    public string $searchTerm = '';

    public string $name;

    public TrendingWord $word;

    public function editTrendingWord(string|int $id): void
    {
        $this->word = $word = TrendingWord::findOrFail($id);
        $this->name = $word->name;
    }

    public function updateTrendingWord(): void
    {
        $this->authorizeRoleOrPermission('trending-word-edit');
        $validatedData = $this->validate([
            'name' => 'required|string|min:2|max:32|unique:trending_words,name,'.$this->word->id,
        ]);

        $this->word->update([
            'name' => $validatedData['name'],
        ]);

        $this->alert('success', trans('Update success!'));
        $this->reset();
        $this->dispatch('hiddenModal');
        $this->dispatch('refresh');
    }

    public function deleteTrendingWord(string|int $id): void
    {
        $this->authorizeRoleOrPermission('trending-word-delete');
        $word = TrendingWord::findOrFail($id);

        $word->delete();
        $this->alert('success', trans('Delete success :name', ['name' => $word->name]));
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
        BaseHelper::setPageTitle(trans('Trending Words'));

        $searchTerm = '%' . $this->searchTerm . '%';
        $words = TrendingWord::where('name', 'like', $searchTerm)
            ->orderByDesc('count')
            ->paginate($this->itemPerPage);

        return view('livewire.admin.trending-word.trending-word-list', [
            'words' => $words,
        ]);
    }
}

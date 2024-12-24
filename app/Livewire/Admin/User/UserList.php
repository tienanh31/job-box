<?php

namespace App\Livewire\Admin\User;

use App\Helpers\BaseHelper;
use App\Models\User;
use Illuminate\View\View;
use Livewire\Attributes\Layout;
use Livewire\Attributes\On;
use Livewire\Attributes\Title;
use Livewire\Component;
use Livewire\WithPagination;

#[Title('List Of Users')]
class UserList extends Component
{
    use WithPagination;

    public string $searchTerm = '';

    public int $itemPerPage = 20;

    public string $filterType = '';

    public function filterByType(string $type): void
    {
        $this->filterType = $type;
    }

    public function updatedSearchTerm(): void
    {
        $this->resetPage();
    }

    #[On('refresh')]
    #[Layout('layouts.admin')]
    public function render(): View
    {
        BaseHelper::setPageTitle(trans('List Of Users'), trans('Users'));

        $searchTerm = '%' . $this->searchTerm . '%';

        $filterType = $this->filterType;

        $users = User::where(function ($query) use ($searchTerm) {
            $query->where('email', 'like', $searchTerm);
        })
            ->when($filterType, function ($query, $filterType) {
                $query->whereHas('roles', function ($query) use ($filterType) {
                    $query->where('name', $filterType);
                });
            })
            ->with('avatar')
            ->orderByDesc('created_at')
            ->paginate($this->itemPerPage);

        return view('livewire.admin.user.user-list', [
            'users' => $users,
        ]);
    }
}

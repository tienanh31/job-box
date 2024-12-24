<?php

namespace App\Livewire\Admin\Category;

use App\Helpers\BaseHelper;
use App\Models\Category;
use App\Traits\AuthorizesRoleOrPermission;
use Illuminate\View\View;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Attributes\Layout;
use Livewire\Attributes\On;
use Livewire\Attributes\Title;
use Livewire\Attributes\Validate;
use Livewire\Component;
use Livewire\WithPagination;

#[Title('List Of Categories')]
class CategoryList extends Component
{
    use WithPagination;
    use LivewireAlert;
    use AuthorizesRoleOrPermission;

    public string $searchTerm = '';

    public int $itemPerPage = 20;

    public Category $category;

    public bool $isEdit = false;

    #[Validate('required|string|min:3|max:32|unique:categories', onUpdate: false)]
    public string $name;

    public function changeType(): void
    {
        $this->isEdit = false;
    }

    public function updatedSearchTerm(): void
    {
        $this->resetPage();
    }

    public function saveCategory(): void
    {
        $this->authorizeRoleOrPermission('category-create');
        $validatedData = $this->validate();

        Category::create([
            'name' => $validatedData['name'],
        ]);

        $this->alert('success', trans('Create success!'));
        $this->reset([
            'name',
        ]);
        $this->dispatch('hiddenModal');
        $this->dispatch('refresh');
    }

    public function editCategory(string|int $id): void
    {
        $this->isEdit = true;
        $this->category = $category = Category::findOrFail($id);
        $this->name = $category->name;
    }

    public function updateCategory(): void
    {
        $this->authorizeRoleOrPermission('category-edit');
        $validatedData = $this->validate([
            'name' => 'required|string|min:2|max:32|unique:categories,name,'.$this->category->id,
        ]);

        $this->category->update([
            'name' => $validatedData['name'],
        ]);

        $this->alert('success', trans('Update success!'));
        $this->reset();
        $this->dispatch('hiddenModal');
        $this->dispatch('refresh');
    }

    public function deleteCategory(string|int $id): void
    {
        $this->authorizeRoleOrPermission('category-delete');
        $category = Category::findOrFail($id);

        if (!$category->jobs()->count()) {
            $category->delete();
            $this->alert('success', trans('Delete success :name', ['name' => $category->name]));
            $this->dispatch('refresh');
            return;
        }

        $this->alert('warning', trans('Can not delete :name', ['name' => $category->name]));
    }

    #[On('refresh')]
    #[Layout('layouts.admin')]
    public function render(): View
    {
        BaseHelper::setPageTitle(trans('Categories'));

        $searchTerm = '%' . $this->searchTerm . '%';
        $categories = Category::where('name', 'like', $searchTerm)
            ->withCount('jobs')
            ->orderByDesc('created_at')
            ->paginate($this->itemPerPage);

        return view('livewire.admin.category.category-list', [
            'categories' => $categories,
        ]);
    }
}

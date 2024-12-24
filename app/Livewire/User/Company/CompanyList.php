<?php

namespace App\Livewire\User\Company;

use Illuminate\View\View;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;
use Livewire\WithPagination;
use Spatie\Permission\Models\Role;

#[Title('Danh Sách Nhà Tuyển Dụng')]
class CompanyList extends Component
{
    use WithPagination;

    public int $itemPerPage = 10;

    #[Layout('layouts.user')]
    public function render(): View
    {
        $role = Role::where('name', 'Company')->first();

        $companies = $role->users()
            ->has('companyProfile')
            ->with('companyProfile', 'avatar')
            ->withCount('jobs')
            ->paginate($this->itemPerPage);

        return view('livewire.user.company.company-list', [
            'companies' => $companies,
        ]);
    }
}

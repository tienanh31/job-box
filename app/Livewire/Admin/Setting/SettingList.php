<?php

namespace App\Livewire\Admin\Setting;

use App\Helpers\BaseHelper;
use Illuminate\View\View;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;

#[Title('Site Settings')]
class SettingList extends Component
{
    #[Layout('layouts.admin')]
    public function render(): View
    {
        BaseHelper::setPageTitle(trans('Site Settings'));
        return view('livewire.admin.setting.setting-list');
    }
}

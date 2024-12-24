<?php

namespace App\Livewire\Admin\FAQ;

use App\Helpers\BaseHelper;
use App\Models\FAQ;
use Illuminate\View\View;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Validate;
use Livewire\Component;

class FAQCreate extends Component
{
    use LivewireAlert;

    #[Validate('required|in:General Questions,Manage Account,Privacy & Security')]
    public string $categoryName;

    #[Validate('required|string|min:10|max:255')]
    public string $question;

    #[Validate('required|string')]
    public string $answer;

    public function saveFAQ(): void
    {
        $validatedData = $this->validate();

        FAQ::create([
            'question' => $validatedData['question'],
            'answer' => $validatedData['answer'],
            'category_name' => $validatedData['categoryName'],
        ]);

        $this->alert('success', trans('Create success'));
        $this->redirect(FAQList::class, navigate: true);
    }

    #[Layout('layouts.admin')]
    public function render(): View
    {
        BaseHelper::setPageTitle(trans('Create FAQ'), trans('FAQs'));

        return view('livewire.admin.faq.faq-create');
    }
}

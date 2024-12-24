<?php

namespace App\Livewire\User\Contact;

use App\Mail\ContactUs;
use App\Repositories\SettingRepository;
use Illuminate\Support\Facades\Mail;
use Illuminate\View\View;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Attributes\Validate;
use Livewire\Component;

#[Title('Liên Hệ Với Chúng Tôi')]
class ContactComponent extends Component
{
    use LivewireAlert;

    #[Validate('required|string|max:32')]
    public string $name;

    #[Validate('required|string|email')]
    public string $email;

    #[Validate('required|max:255')]
    public string $subject;

    #[Validate('required|string')]
    public string $message;

    public function sendContact(): void
    {
        $validatedData = $this->validate();

        $repositories = new SettingRepository();

        $settings = $repositories->getAllSettings();

        Mail::to($settings['email'])
            ->send(new ContactUs($validatedData));
        $this->alert('success', trans('Send email success'));
        $this->reset();
    }

    #[Layout('layouts.user')]
    public function render(): View
    {
        return view('livewire.user.contact.contact-component');
    }
}

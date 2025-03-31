<?php

namespace App\Livewire;

use Illuminate\Support\Facades\Mail;
use App\Mail\ContactMessageMail;

use Livewire\Component;
use App\Models\ContactMessage;

class ContactForm extends Component
{
    public $name, $phone, $email, $message;

    protected $rules = [
        'name' => 'required|string|max:255',
        'phone' => 'nullable|string|max:50',
        'email' => 'required|email',
        'message' => 'required|string|max:2000',
    ];

    public function submit()
    {
        $this->validate();

        $data = [
            'name' => $this->name,
            'phone' => $this->phone,
            'email' => $this->email,
            'message' => $this->message,
        ];

        ContactMessage::create($data);

        Mail::to('r.a.bazhenoff@gmail.com')->send(new ContactMessageMail($data));

        $this->reset();

        session()->flash('success', 'Спасибо! Ваше сообщение отправлено.');
    }

    public function render()
    {
        return view('livewire.contact-form');
    }
}

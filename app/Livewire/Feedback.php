<?php

namespace App\Livewire;

use App\Filament\Admin\Resources\FeedbackResource;
use Filament\Notifications\Notification;
use Livewire\Component;

class Feedback extends Component
{
    public $name;
    public $email;
    public $subject;
    public $message;

    public function store()
    {
        $this->validate([
            'name' => 'required',
            'email' => 'required|email',
            'subject' => 'required',
            'message' => 'required',
        ]);

        // Store the feedback
        \App\Models\Feedback::create([
            'name' => $this->name,
            'email' => $this->email,
            'subject' => $this->subject,
            'message' => $this->message,
        ]);

        // Clear the form
        $this->name = '';
        $this->email = '';
        $this->subject = '';
        $this->message = '';

        flash()->success('Feedback submitted successfully!');

        $user = \App\Models\User::all();

        Notification::make()
            ->success()
            ->icon('heroicon-o-chat-alt')
            ->title('New Feedback!')
            ->body('Check the new Feedback!')
            ->actions([\Filament\Actions\Action::make('View')->url(FeedbackResource::getUrl('edit', ['record' => $this->feedback->id]))])
            ->sendToDatabase($user);
    }

    public function render()
    {
        return view('livewire.feedback');
    }
}

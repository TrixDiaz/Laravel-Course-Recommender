<?php

namespace App\Filament\Admin\Resources\CourseResource\Pages;

use App\Filament\Admin\Resources\CourseResource;
use Filament\Notifications\Actions\Action;
use Filament\Notifications\Notification;
use Filament\Resources\Pages\CreateRecord;

class CreateCourse extends CreateRecord
{
    protected static string $resource = CourseResource::class;

    protected function getCreatedNotification(): ?Notification
    {
        $record = $this->record;

        $notification = Notification::make()
            ->title('Course Created')
            ->success()
            ->body('The course' . $record->name . 'was created Successfully.')
            ->icon('heroicon-m-book-open')
            ->actions([
                Action::make('view')
                    ->label('Mark as read')
                    ->button()
                    ->markAsRead(),
                Action::make('view')
                    ->label('Mark as unread')
                    ->link()
                    ->markAsUnread(),
            ])
            ->sendToDatabase(auth()->user());

        return $notification;
    }

    protected function getHeaderActions(): array
    {
        return [

        ];
    }
}

<?php

namespace App\Filament\Admin\Resources\CourseResource\Pages;

use App\Filament\Admin\Resources\CourseResource;
use App\Models\Course;
use Filament\Notifications\Notification;
use Filament\Resources\Pages\EditRecord;

class EditCourse extends EditRecord
{
    protected static string $resource = CourseResource::class;

//    protected function getRedirectUrl(): string
//    {
//        return $this->getResource()::getUrl('index');
//    }

    protected function getSavedNotification(): ?Notification
    {
        $record = $this->getRecord();

        $notification = Notification::make()
            ->success()
            ->icon('heroicon-m-book-open')
            ->title('Course Updated')
            ->body("Course {$record->name} Updated Successfully!")
            ->actions([
                \Filament\Notifications\Actions\Action::make('view')
                    ->label('Mark as read')
                    ->button()
                    ->markAsRead(),
                \Filament\Notifications\Actions\Action::make('view')
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
            \Filament\Actions\Action::make('is_active')
                ->label(fn(Course $record) => $record->is_active ? 'Unpublish Course' : 'Publish Course')
                ->action(function (Course $record) {
                    // Toggle the 'is_active' status
                    $record->update(['is_active' => !$record->is_active]);

                    // Send a notification after the update
                    Notification::make()
                        ->title('Course Status Updated')
                        ->success() // You can use other status like 'error', 'info', etc.
                        ->body('The course has been ' . ($record->is_active ? 'published' : 'unpublished') . ' successfully.')
                        ->send();
                }),
        ];
    }
}

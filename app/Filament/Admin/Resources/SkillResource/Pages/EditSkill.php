<?php

namespace App\Filament\Admin\Resources\SkillResource\Pages;

use App\Filament\Admin\Resources\SkillResource;
use App\Models\Skill;
use Filament\Actions;
use Filament\Notifications\Notification;
use Filament\Resources\Pages\EditRecord;

class EditSkill extends EditRecord
{
    protected static string $resource = SkillResource::class;
//    protected function getRedirectUrl(): string
//    {
//        return $this->getResource()::getUrl('index');
//    }

    protected function getSavedNotification(): ?Notification
    {
        $record = $this->getRecord();

        $notification = Notification::make()
            ->success()
            ->icon('heroicon-m-cube-transparent')
            ->title('Skill Updated')
            ->body("Skill {$record->name} Updated Successfully!")
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
                ->label(fn(Skill $record) => $record->is_active ? 'Unpublish Skill' : 'Publish Skill')
                ->action(function (Skill $record) {
                    // Toggle the 'is_active' status
                    $record->update(['is_active' => !$record->is_active]);

                    // Send a notification after the update
                    Notification::make()
                        ->title('Skill Status Updated')
                        ->success() // You can use other status like 'error', 'info', etc.
                        ->body('The Skill has been ' . ($record->is_active ? 'published' : 'unpublished') . ' successfully.')
                        ->send();
                }),
            Actions\DeleteAction::make(),
        ];
    }
}

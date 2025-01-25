<?php

namespace App\Filament\Admin\Resources\SkillResource\Pages;

use App\Filament\Admin\Resources\SkillResource;
use Filament\Actions;
use Filament\Notifications\Actions\Action;
use Filament\Notifications\Notification;
use Filament\Resources\Pages\CreateRecord;

class CreateSkill extends CreateRecord
{
    protected static string $resource = SkillResource::class;

    protected function getCreatedNotification(): ?Notification
    {
        $record = $this->record;

        $notification = Notification::make()
            ->title('Skill Created')
            ->success()
            ->body('The skill' . $record->name . 'was created Successfully.')
            ->icon('heroicon-m-cube-transparent')
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
}

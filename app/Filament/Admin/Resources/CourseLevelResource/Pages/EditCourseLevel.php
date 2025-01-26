<?php

namespace App\Filament\Admin\Resources\CourseLevelResource\Pages;

use App\Filament\Admin\Resources\CourseLevelResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditCourseLevel extends EditRecord
{
    protected static string $resource = CourseLevelResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}

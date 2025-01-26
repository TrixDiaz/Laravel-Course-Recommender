<?php

namespace App\Filament\Admin\Resources\CourseLevelResource\Pages;

use App\Filament\Admin\Resources\CourseLevelResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListCourseLevels extends ListRecords
{
    protected static string $resource = CourseLevelResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}

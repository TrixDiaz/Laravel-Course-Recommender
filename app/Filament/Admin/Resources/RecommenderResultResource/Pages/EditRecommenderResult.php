<?php

namespace App\Filament\Admin\Resources\RecommenderResultResource\Pages;

use App\Filament\Admin\Resources\RecommenderResultResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditRecommenderResult extends EditRecord
{
    protected static string $resource = RecommenderResultResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}

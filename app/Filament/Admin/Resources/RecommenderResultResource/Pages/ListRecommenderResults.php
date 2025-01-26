<?php

namespace App\Filament\Admin\Resources\RecommenderResultResource\Pages;

use App\Filament\Admin\Resources\RecommenderResultResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListRecommenderResults extends ListRecords
{
    protected static string $resource = RecommenderResultResource::class;

    protected function getHeaderActions(): array
    {
        return [
//            Actions\CreateAction::make(),
        ];
    }
}

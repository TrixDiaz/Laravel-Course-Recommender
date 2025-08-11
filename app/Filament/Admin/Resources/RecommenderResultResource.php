<?php

namespace App\Filament\Admin\Resources;

use App\Filament\Admin\Resources\RecommenderResultResource\Pages;
use App\Filament\Admin\Resources\RecommenderResultResource\RelationManagers;
use App\Models\RecommenderResult;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class RecommenderResultResource extends Resource
{
    protected static ?string $model = RecommenderResult::class;

    protected static ?string $navigationGroup = 'RecommenderResult';

    protected static ?string $navigationLabel = 'Recommender Result';

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function getNavigationBadge(): ?string
    {
        return static::getModel()::count();
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make()
                    ->schema([
                        Forms\Components\TextInput::make('name')
                            ->required(),
                        Forms\Components\TextInput::make('school')
                            ->required(),
                        Forms\Components\TextInput::make('average')
                            ->required()
                            ->numeric(),
                        Forms\Components\Select::make('courses')
                            ->relationship('courses', 'course_code')
                            ->required()
                            ->searchable()
                            ->preload()
                            ->native(false)
                            ->multiple(),
                    ])->columns(2),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name')
                    ->searchable(),
                Tables\Columns\TextColumn::make('school')
                    ->searchable(),
                Tables\Columns\TextColumn::make('average')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('courses.course_code')
                    ->listWithLineBreaks()
                    ->bulleted()
                    ->limitList(1)
                    ->expandableLimitedList(),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                //
            ])
            ->actions([
                //                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                //                Tables\Actions\BulkActionGroup::make([
                //                    Tables\Actions\DeleteBulkAction::make(),
                //                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListRecommenderResults::route('/'),
            'create' => Pages\CreateRecommenderResult::route('/create'),
            'edit' => Pages\EditRecommenderResult::route('/{record}/edit'),
        ];
    }
}

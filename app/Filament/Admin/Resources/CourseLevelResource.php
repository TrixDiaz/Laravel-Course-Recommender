<?php

namespace App\Filament\Admin\Resources;

use App\Filament\Admin\Resources\CourseLevelResource\Pages;
use App\Filament\Admin\Resources\CourseLevelResource\RelationManagers;
use App\Models\CourseLevel;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class CourseLevelResource extends Resource
{
    protected static ?string $model = CourseLevel::class;

    protected static ?string $navigationGroup = 'Course Level';
    protected static ?string $navigationLabel = 'Course Level';
    protected static ?string $navigationIcon = 'heroicon-o-building-office';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make()
                    ->schema([
                        Forms\Components\TextInput::make('name')
                            ->required(),
                        Forms\Components\Select::make('course_id')
                            ->relationship('course', 'name')
                            ->required()
                            ->searchable()
                            ->preload()
                            ->native(false),
                        Forms\Components\Select::make('skill')
                            ->relationship('skills', 'name')
                            ->required()
                            ->searchable()
                            ->preload()
                            ->native(false)
                            ->multiple(),
                        Forms\Components\TextInput::make('level')
                            ->minValue(1)
                            ->maxValue(10)
                            ->step(0.001)
                            ->required()
                            ->numeric(),
                    ])->columns(2),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name')
                    ->searchable(),
                Tables\Columns\TextColumn::make('course.name')
                    ->sortable(),
                Tables\Columns\TextColumn::make('courseLevelSkill.skill.name')
                    ->sortable()
                    ->listWithLineBreaks()
                    ->bulleted()
                    ->limitList(1)
                    ->expandableLimitedList(),
                Tables\Columns\TextColumn::make('level')
                    ->numeric()
                    ->sortable(),
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
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
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
            'index' => Pages\ListCourseLevels::route('/'),
            'create' => Pages\CreateCourseLevel::route('/create'),
            'edit' => Pages\EditCourseLevel::route('/{record}/edit'),
        ];
    }
}

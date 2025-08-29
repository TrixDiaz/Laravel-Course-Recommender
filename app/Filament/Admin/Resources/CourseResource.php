<?php

namespace App\Filament\Admin\Resources;

use App\Filament\Admin\Resources\CourseResource\Pages;
use App\Models\Course;
use Filament\Actions\RestoreAction;
use Filament\Actions\ViewAction;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class CourseResource extends Resource
{
    protected static ?string $model = Course::class;

    protected static ?string $navigationGroup = 'Courses';

    protected static ?string $navigationLabel = 'Course';
    protected static ?string $navigationIcon = 'heroicon-o-book-open';

    public static function getNavigationBadge(): ?string
    {
        return static::getModel()::count();
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make('Course Information')
                    ->schema([
                        Forms\Components\TextInput::make('name')
                            ->label('Name')
                            ->required()
                            ->maxLength(200),
                        Forms\Components\TextInput::make('course_code')
                            ->label('Course Code')
                            ->required()
                            ->maxLength(10),
                        Forms\Components\TextInput::make('required_average')
                            ->label('Required Average')
                            ->required()
                            ->numeric()
                            ->minValue('75')
                            ->maxValue('100'),
                    ])->columns(3),
                Forms\Components\Section::make()
                    ->schema([
                        Forms\Components\Textarea::make('course_description')
                            ->label('Course Description (optional)')
                            ->maxLength(255)
                            ->placeholder("Optional")
                            ->columnSpanFull(),
                    ]),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('Course Information')
                    ->sortable()
                    ->default(fn(Course $record): string => $record->name . ' - ' . $record->course_code)
                    ->searchable(['name', 'course_code'])
                    ->description(fn(Course $record): string => $record->course_description ?? '')
                    ->words(6),
                Tables\Columns\TextColumn::make('required_average')
                    ->label('Required Average')
                    ->searchable()
                    ->sortable()
                    ->badge(),
                Tables\Columns\ToggleColumn::make('is_active')
                    ->label('Publish')
                    ->onIcon('heroicon-m-bolt')
                    ->offIcon('heroicon-m-bolt-slash'),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('updated_at')
                    ->since()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                Tables\Filters\TrashedFilter::make(),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
                Tables\Actions\RestoreAction::make(),
                Tables\Actions\ForceDeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListCourses::route('/'),
            'create' => Pages\CreateCourse::route('/create'),
            'edit' => Pages\EditCourse::route('/{record}/edit'),
        ];
    }
}

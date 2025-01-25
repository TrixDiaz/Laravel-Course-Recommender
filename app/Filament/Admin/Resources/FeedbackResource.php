<?php

namespace App\Filament\Admin\Resources;

use App\Filament\Admin\Resources\FeedbackResource\Pages;
use App\Filament\Admin\Resources\FeedbackResource\RelationManagers;
use App\Models\Feedback;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class FeedbackResource extends Resource
{
    protected static ?string $model = Feedback::class;
    protected static ?string $navigationGroup = 'Feedbacks';
    protected static ?string $navigationLabel = 'Feedback';
    protected static ?string $navigationIcon = 'heroicon-o-envelope';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make()
                    ->schema([
                       Forms\Components\TextInput::make('message')
                        ->disabled()
                    ]),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('Information')
                    ->searchable(['name', 'email'])
                    ->default(fn (Feedback $record) => $record->email)
                    ->description(fn(Feedback $record) => $record->name)
                    ->icon('heroicon-m-envelope')
                    ->color('secondary'),
                Tables\Columns\TextColumn::make('subject')
                    ->description(fn(Feedback $record) => implode(' ', array_slice(explode(' ', $record->message), 0, 6)) // Limit to 6 words
                    )
                    ->words(6),
                Tables\Columns\TextColumn::make('created_at')
                    ->label('Date Submitted')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: false)
                    ->color('danger'),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\ViewAction::make(),
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
            'index' => Pages\ListFeedback::route('/'),
//            'create' => Pages\CreateFeedback::route('/create'),
//            'edit' => Pages\EditFeedback::route('/{record}/edit'),
        ];
    }
}

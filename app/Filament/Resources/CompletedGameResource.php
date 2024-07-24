<?php

namespace App\Filament\Resources;

use App\Filament\Resources\CompletedGameResource\Pages;
use App\Filament\Resources\CompletedGameResource\RelationManagers;
use App\Models\CompletedGame;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class CompletedGameResource extends Resource
{
    protected static ?string $model = CompletedGame::class;

    protected static ?string $navigationGroup = 'Gry';

    public static function form(Form $form): Form
    {
        return $form
            ->schema(CompletedGame::getForm());
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('title')
                    ->searchable(),
                Tables\Columns\TextColumn::make('slug')
                    ->searchable(),
                Tables\Columns\TextColumn::make('thumbnail')
                    ->searchable(),
                Tables\Columns\TextColumn::make('year')
                    ->date()
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

  

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListCompletedGames::route('/'),
            'create' => Pages\CreateCompletedGame::route('/create'),
            'edit' => Pages\EditCompletedGame::route('/{record}/edit'),
        ];
    }

    public static function getNavigationLabel(): string
    {
        return ('Ukończone Gry');
    }
    public static function getPluralLabel(): string
    {
        return ('Ukończone Gry');
    }

    public static function getLabel(): string
    {
        return ('Ukończona Gra');
    }
}

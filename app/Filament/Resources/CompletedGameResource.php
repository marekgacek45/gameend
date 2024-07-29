<?php

namespace App\Filament\Resources;

use Filament\Forms;
use Filament\Tables;
use Filament\Forms\Form;
use Filament\Tables\Table;
use App\Models\CompletedGame;
use Illuminate\Support\Carbon;
use Filament\Resources\Resource;
use Filament\Tables\Columns\ImageColumn;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\CompletedGameResource\Pages;
use App\Filament\Resources\CompletedGameResource\RelationManagers;

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

            ->defaultSort('created_at', 'asc')
            ->columns([
                Tables\Columns\ImageColumn::make('thumbnail')
                    ->label('Miniaturka')
                    ->circular(),
                Tables\Columns\TextColumn::make('title')
                    ->label('Tytuł')
                    ->sortable()
                    ->searchable(),
                Tables\Columns\TextColumn::make('posts_count')
                    ->label('Liczba postów')
                    ->counts('posts')
                    ->sortable(),
                Tables\Columns\TextColumn::make('year')
                    ->label('Rok ukończenia')
                    ->sortable(),
                ImageColumn::make('categories.thumbnail')
                    ->label('Kategorie')
                    ->circular()
                    ->stacked()
                    ->limit(3)
                    ->limitedRemainingText(),
                ImageColumn::make('tags.thumbnail')
                    ->label('Tagi')
                    ->circular()
                    ->stacked()
                    ->limit(3)
                    ->limitedRemainingText(),
                Tables\Columns\TextColumn::make('created_at')
                    ->label('Data utworzenia')
                    ->dateTime()
                    ->sortable()
                    ->formatStateUsing(function ($state) {
                        return Carbon::parse($state)->format('d-m-Y');
                    })
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('updated_at')
                    ->label('Data modyfikacji')
                    ->dateTime()
                    ->sortable()
                    ->formatStateUsing(function ($state) {
                        return Carbon::parse($state)->format('d-m-Y');
                    })
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

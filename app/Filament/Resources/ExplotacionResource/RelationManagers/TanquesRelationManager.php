<?php

namespace App\Filament\Resources\ExplotacionResource\RelationManagers;

use Filament\Forms;
use Filament\Resources\Form;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Resources\Table;
use Filament\Tables;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class TanquesRelationManager extends RelationManager
{
    protected static string $relationship = 'tanques';

    protected static ?string $recordTitleAttribute = 'letraq';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('letraq')
                    ->required()
                    ->maxLength(20),
                Forms\Components\TextInput::make('tipo')
                    ->required()
                    ->maxLength(20),
                Forms\Components\TextInput::make('modelo')
                    ->required()
                    ->maxLength(20),

            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('letraq'),
            ])
            ->filters([
                //
            ])
            ->headerActions([
                Tables\Actions\CreateAction::make(),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make(),
            ]);
    }    
}

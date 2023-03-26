<?php

namespace App\Filament\Resources;

use App\Filament\Resources\DniResource\Pages;
use App\Filament\Resources\DniResource\RelationManagers;
use App\Models\Dni;
use Filament\Forms;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class DniResource extends Resource
{
    protected static ?string $model = Dni::class;

    protected static ?string $navigationIcon = 'heroicon-o-collection';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('codigo_pais')
                    ->required()
                    ->maxLength(10),
                Forms\Components\TextInput::make('dni')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('direccion1')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('direccion2')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('comunidad')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('provincia')
                    ->maxLength(45),
                Forms\Components\TextInput::make('localidad')
                    ->maxLength(45),
                Forms\Components\TextInput::make('codigo_postal')
                    ->required()
                    ->maxLength(10),
                Forms\Components\TextInput::make('pais')
                    ->required()
                    ->maxLength(10),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('codigo_pais'),
                Tables\Columns\TextColumn::make('dni'),
                Tables\Columns\TextColumn::make('direccion1'),
                Tables\Columns\TextColumn::make('direccion2'),
                Tables\Columns\TextColumn::make('comunidad'),
                Tables\Columns\TextColumn::make('provincia'),
                Tables\Columns\TextColumn::make('localidad'),
                Tables\Columns\TextColumn::make('codigo_postal'),
                Tables\Columns\TextColumn::make('pais'),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime(),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime(),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\ViewAction::make(),
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make(),
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
            'index' => Pages\ListDnis::route('/'),
            'create' => Pages\CreateDni::route('/create'),
            'view' => Pages\ViewDni::route('/{record}'),
            'edit' => Pages\EditDni::route('/{record}/edit'),
        ];
    }    
}

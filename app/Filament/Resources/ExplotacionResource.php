<?php

namespace App\Filament\Resources;

use Filament\Forms;
use Filament\Tables;
use App\Models\Explotacion;
use Filament\Resources\Form;
use Filament\Resources\Table;
use Filament\Resources\Resource;
use Filament\Forms\Components\Card;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\ExplotacionResource\Pages;
use App\Filament\Resources\ExplotacionResource\RelationManagers;
use App\Filament\Resources\ExplotacionResource\RelationManagers\TanquesRelationManager;

class ExplotacionResource extends Resource
{
    protected static ?string $model = Explotacion::class;

    protected static ?string $navigationIcon = 'heroicon-o-collection';
    protected static ?string $navigationGroup = 'Explotacion';
    protected static ?string $modelLabel = 'Explotaciones';

    protected static ?string $recordTitleAttribute = 'nombre';




    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Card::make()
                ->schema([

                    Forms\Components\Select::make('empresa_id')
                        ->relationship('empresa', 'nombre')
                        ->required(),
                    Forms\Components\TextInput::make('pais')
                        ->required()
                        ->maxLength(255),
                    Forms\Components\TextInput::make('dni')
                        ->required()
                        ->maxLength(255),
                    Forms\Components\TextInput::make('nombre')
                        ->required()
                        ->maxLength(255),
                    Forms\Components\TextInput::make('direccion1')
                        ->required()
                        ->maxLength(255),
                    Forms\Components\TextInput::make('direccion2')
                        ->maxLength(255),
                    Forms\Components\TextInput::make('localidad')
                        ->maxLength(255),
                    Forms\Components\TextInput::make('municipio')
                        ->maxLength(255),
                    Forms\Components\TextInput::make('provincia')
                        ->maxLength(255),
                    Forms\Components\TextInput::make('codigo_postal')
                        ->rule('numeric')
                        ->maxLength(8),
                    Forms\Components\TextInput::make('telefono')
                        ->tel()
                        ->maxLength(255),
                    Forms\Components\TextInput::make('fax')
                        ->maxLength(255),
                    Forms\Components\TextInput::make('movil')->rule('numeric'),
                    Forms\Components\TextInput::make('email')
                        ->email()
                        ->maxLength(255),
                    Forms\Components\TextInput::make('codigo_simogan')
                        ->maxLength(255),
                    Forms\Components\TextInput::make('registro_sanitario')
                        ->maxLength(255),
                    Forms\Components\TextInput::make('registro_compra')
                        ->maxLength(255),
                    Forms\Components\TextInput::make('codigo_laboratorio')
                        ->maxLength(255),
                    Forms\Components\TextInput::make('status')
                        ->maxLength(45),
                ])
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('empresa.id'),
                Tables\Columns\TextColumn::make('pais'),
                Tables\Columns\TextColumn::make('dni'),
                Tables\Columns\TextColumn::make('nombre'),
                Tables\Columns\TextColumn::make('direccion1'),
                Tables\Columns\TextColumn::make('direccion2'),
                Tables\Columns\TextColumn::make('localidad'),
                Tables\Columns\TextColumn::make('municipio'),
                Tables\Columns\TextColumn::make('provincia'),
                Tables\Columns\TextColumn::make('codigo_postal'),
                Tables\Columns\TextColumn::make('telefono'),
                Tables\Columns\TextColumn::make('fax'),
                Tables\Columns\TextColumn::make('movil'),
                Tables\Columns\TextColumn::make('email'),
                Tables\Columns\TextColumn::make('codigo_simogan'),
                Tables\Columns\TextColumn::make('registro_sanitario'),
                Tables\Columns\TextColumn::make('registro_compra'),
                Tables\Columns\TextColumn::make('codigo_laboratorio'),
                Tables\Columns\TextColumn::make('status'),
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
            TanquesRelationManager::class,
        ];
    }
    
    public static function getPages(): array
    {
        return [
            'index' => Pages\ListExplotacions::route('/'),
            'create' => Pages\CreateExplotacion::route('/create'),
            'view' => Pages\ViewExplotacion::route('/{record}'),
            'edit' => Pages\EditExplotacion::route('/{record}/edit'),
        ];
    }    

    public static function getGloballySearchableAttributes(): array  {
        return ['nombre', 'email'];

    }
}

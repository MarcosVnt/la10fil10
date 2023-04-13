<?php

namespace App\Filament\Resources;

use Filament\Forms;
use Filament\Tables;
use App\Models\Empresa;
use Filament\Resources\Form;
use Filament\Resources\Table;
use Filament\Resources\Resource;
use Filament\Forms\Components\Card;
use Illuminate\Database\Eloquent\Builder;
use App\Filament\Resources\EmpresaResource\Pages;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\EmpresaResource\RelationManagers;

class EmpresaResource extends Resource
{
    protected static ?string $model = Empresa::class;

    protected static ?string $navigationIcon = 'heroicon-o-heart';
    protected static ?string $recordTitleAttribute = 'dni';

    protected static ?string $modelLabel = 'Empresa';



    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Card::make()
                    ->schema([
                        
                 

                        Forms\Components\Select::make('dni_id')
                            ->relationship('dni', 'dni')
                            ->searchable()
                            ->required(),
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
                        Forms\Components\TextInput::make('codigo_postal'),
                        Forms\Components\TextInput::make('telefono')
                            ->tel()
                            ->maxLength(255),
                        Forms\Components\TextInput::make('fax')
                            ->maxLength(255),
                        Forms\Components\TextInput::make('movil'),
                        Forms\Components\TextInput::make('actividad')
                            ->maxLength(255),
                        Forms\Components\TextInput::make('email')
                            ->email()
                            ->maxLength(255),
                        Forms\Components\TextInput::make('registro_sanitario')
                            ->maxLength(255),
                        Forms\Components\TextInput::make('registro_compra')
                            ->maxLength(255),
                        Forms\Components\TextInput::make('status')
                            ->maxLength(45),
                            ])
                            ->columns(2)
                    ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('dni.id'),
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
                Tables\Columns\TextColumn::make('actividad'),
                Tables\Columns\TextColumn::make('email'),
                Tables\Columns\TextColumn::make('registro_sanitario'),
                Tables\Columns\TextColumn::make('registro_compra'),
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
            //
        ];
    }
    
    public static function getPages(): array
    {
        return [
            'index' => Pages\ListEmpresas::route('/'),
           'create' => Pages\CreateEmpresa::route('/create'),
            'view' => Pages\ViewEmpresa::route('/{record}'),
            'edit' => Pages\EditEmpresa::route('/{record}/edit'),
        ];
    }    
}

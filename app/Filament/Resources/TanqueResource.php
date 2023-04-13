<?php

namespace App\Filament\Resources;

use Filament\Forms;
use Filament\Tables;
use App\Models\Tanque;
use App\Models\Explotacion;
use Filament\Resources\Form;
use Filament\Resources\Table;
use Filament\Resources\Resource;
use Filament\Forms\Components\Card;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Illuminate\Database\Eloquent\Builder;
use App\Filament\Resources\TanqueResource\Pages;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\TanqueResource\RelationManagers;

class TanqueResource extends Resource
{
    protected static ?string $model = Tanque::class;

    protected static ?string $navigationIcon = 'heroicon-o-collection';
    protected static ?string $navigationGroup = 'Explotacion';


    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Card::make()
                ->schema([
                    Select::make('explotacion_id')
                        ->label('Explotación')
                        ->options(Explotacion::all()->pluck('nombre','id'))
                        ->searchable(),

                    TextInput::make('letraq')
                    ->label('codigoQ')
                    ->required()
                    ->maxLength(30),

                    TextInput::make('modelo')
                    ->required()
                    ->maxLength(30),

                    Select::make('tipo')
                        ->options(['cisterna' => 'cisterna',
                        'remolque' => 'remolque',
                        'silo' => 'silo'])
                        ->required(),
                    
                ])    
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('letraq'),
                Tables\Columns\TextColumn::make('tipo'),
                Tables\Columns\TextColumn::make('modelo'),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make()
                ->slideOver(),
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
            'index' => Pages\ListTanques::route('/'),
            'create' => Pages\CreateTanque::route('/create'),
            'edit' => Pages\EditTanque::route('/{record}/edit'),
        ];
    }    
}

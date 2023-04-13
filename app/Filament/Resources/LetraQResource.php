<?php

namespace App\Filament\Resources;

use Filament\Forms;
use Filament\Tables;
use App\Models\LetraQ;
use Filament\Resources\Form;
use Filament\Resources\Table;
use Filament\Resources\Resource;
use Filament\Forms\Components\Card;
use Illuminate\Database\Eloquent\Builder;
use App\Filament\Resources\LetraQResource\Pages;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\LetraQResource\RelationManagers;

class LetraQResource extends Resource
{
    protected static ?string $model = LetraQ::class;

    protected static ?string $navigationIcon = 'heroicon-o-collection';


    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Card::make()
                ->schema([
                    Forms\Components\TextInput::make('letraQ')
                        ->maxLength(2)
                        ->required(),
                    Forms\Components\TextInput::make('modelo')
                        ->maxLength(2)
                        ->required(),
                    Forms\Components\Select::make('tipo')
                        ->required()
                        ->options([
                            'Vehiculo' => 'Vehiculo',
                            'Remolque' => 'Remolque',
                            'Industria' => 'industria'
                        ])
                ])->columns(3)
                
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('letraq'),
              
                Tables\Columns\TextColumn::make('modelo'),
                Tables\Columns\TextColumn::make('tipo'),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make(),
            ]);
    }
    
    public static function getPages(): array
    {
        return [
            'index' => Pages\ManageLetraQS::route('/'),
        ];
    }    
}

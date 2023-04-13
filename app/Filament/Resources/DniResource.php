<?php

namespace App\Filament\Resources;

use App\Models\Dni;
use Filament\Forms;
use Filament\Tables;
use App\Utils\ValidateDni;
use Filament\Resources\Form;
use Filament\Resources\Table;
use Filament\Resources\Resource;
use Filament\Forms\Components\Card;
use Filament\Forms\Components\Grid;
use Filament\Tables\Filters\SelectFilter;
use Illuminate\Database\Eloquent\Builder;
use App\Filament\Resources\DniResource\Pages;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\DniResource\RelationManagers;

class DniResource extends Resource
{
    protected static ?string $model = Dni::class;

    protected static ?string $navigationIcon = 'heroicon-o-collection';
    protected static ?string $navigationGroup = 'Settings';
    protected static ?string $recordTitleAttribute = 'nombre';


    public static function form(Form $form): Form
    {
        return $form
            ->schema([

               

                Card::make()
                ->schema([

                    Grid::make(2)
                    ->schema([
    
                        Forms\Components\Select::make('country_id')
                            ->relationship('country', 'code')
                            ->createOptionForm([
                                Forms\Components\TextInput::make('code')
                                    ->maxLength(2)
                                    ->required(),
                                Forms\Components\TextInput::make('name')
                                    ->required()
                                    ->columns(2),
                                    
                            ])
                            ->required(),
    
                        Forms\Components\TextInput::make('dni')
                            ->required()
                            ->maxLength(14)
                            //->startsWith(['a'])
                            ->rules([
                                function () {
                                    return function (string $attribute, $value,  $fail) {
                                    
                                        /*if ($value === 'foo') {
                                            $fail("The {$attribute} is invalid.");
                                        }*/
                                       // dd(ValidateDni::check_dni($value));
                                        if(!ValidateDni::check_dni($value)) {
                                            $fail(" Formato {$attribute} no es válido.");
                                        }
                                    };
                                },
                            ])
                    ]),

                 
                

                    Forms\Components\TextInput::make('nombre')
                                ->required()
                                ->maxLength(255),
                            Forms\Components\TextInput::make('direccion1')
                                ->required()
                                ->maxLength(255),
                            Forms\Components\TextInput::make('direccion2')
                                ->maxLength(255),
                            Forms\Components\TextInput::make('localidad')
                                ->maxLength(40),
                            Forms\Components\TextInput::make('municipio')
                                ->maxLength(40),
                            Forms\Components\TextInput::make('provincia')
                                ->maxLength(40),
                            Forms\Components\TextInput::make('codigo_postal')
                                ->numeric(),
                            Forms\Components\TextInput::make('telefono')
                                ->tel()
                                ->maxLength(40),
                            Forms\Components\TextInput::make('fax')
                                ->numeric()
                                ->maxLength(40),
                            Forms\Components\TextInput::make('movil')
                                ->numeric(),
                            Forms\Components\TextInput::make('email')
                                ->email()
                                ->maxLength(40),
                ])
                ->columns(2)
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('country.name'),
                Tables\Columns\TextColumn::make('dni')->sortable()->searchable(),
                Tables\Columns\TextColumn::make('nombre')->sortable()->searchable(),
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
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime(),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime(),
            ])
            ->filters([
                //
                SelectFilter::make('country')->relationship('country','name')
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

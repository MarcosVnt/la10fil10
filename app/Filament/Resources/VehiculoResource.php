<?php

namespace App\Filament\Resources;

use Filament\Forms;
use Filament\Tables;
use App\Models\Vehiculo;
use App\Utils\ValidateDni;
use Filament\Resources\Form;
use Filament\Resources\Table;
use Filament\Resources\Resource;
use Filament\Forms\Components\Card;
use Filament\Forms\Components\Grid;
use Illuminate\Database\Eloquent\Builder;
use App\Filament\Resources\VehiculoResource\Pages;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\VehiculoResource\RelationManagers;

class VehiculoResource extends Resource
{
    protected static ?string $model = Vehiculo::class;

    protected static ?string $navigationIcon = 'heroicon-o-truck';
    protected static ?string $navigationGroup = 'Vehiculos';


    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Card::make()
                ->schema([

                    Forms\Components\FieldSet::make('veh')->schema([ 
                        Forms\Components\TextInput::make('matricula')
                        ->required()
                        ->maxLength(10),
                        Forms\Components\TextInput::make('marca')
                        ->required()
                        ->maxLength(10),
                        Forms\Components\TextInput::make('modelo')
                        ->required()
                        ->maxLength(10)
                    ])->columns(3),
                    Forms\Components\Select::make('dni_id')
                    ->relationship('dni', 'nombre')
                    ->label('Propietario')
                      ->searchable(['dni','nombre'])
                    ->createOptionForm([
                        Card::make()
                        ->schema([
        
                            Grid::make(2)
                            ->schema([
            
                                Forms\Components\Select::make('country_id')
                                    ->relationship('country', 'code')
                                  
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
        
                            
                    ])
                    ->required(),

                    Forms\Components\Select::make('letraq_id')
                    ->relationship('letraq', 'letraq')
                    ->label('Tractora')
                    ->searchable()
                    ->createOptionForm([
                        Card::make()
                        ->schema([
                            Forms\Components\TextInput::make('letraq')
                                ->maxLength(10)
                                ->required(),
                            Forms\Components\TextInput::make('modelo')
                                ->maxLength(30)
                                ->required(),
                            Forms\Components\Select::make('tipo')
                                ->required()
                                ->options([
                                    'Vehiculo' => 'Vehiculo',
                                   
                                ])
                                ->default('Vehiculo')
                        ])->columns(3)
                            
                    ])
                    ->required(),


                    Forms\Components\Select::make('remolque_id')
                    ->relationship('letraq', 'letraq')
                    ->label('Remolque')
                    ->searchable()
                    ->createOptionForm([
                        Card::make()
                        ->schema([
                            Forms\Components\TextInput::make('letraq')
                                ->maxLength(10)
                                ->required(),
                            Forms\Components\TextInput::make('modelo')
                                ->maxLength(30)
                                ->required(),
                            Forms\Components\Select::make('tipo')
                                ->required()
                                ->options([
                                  
                                    'Remolque' => 'Remolque'
                                    
                                ])
                                ->default('Remolque')
                        ])->columns(3)
                            
                    ])
                    ->required(),


                    Forms\Components\Toggle::make('active')
                    ->default('true')
                    ->required(),
                ])        
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
               
                

                //tipo, letraq_id, remolque_id, dni_id, ative 



            ])
            ->filters([
                //
            ])
            ->actions([
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
            'index' => Pages\ListVehiculos::route('/'),
            'create' => Pages\CreateVehiculo::route('/create'),
            'edit' => Pages\EditVehiculo::route('/{record}/edit'),
        ];
    }    
}

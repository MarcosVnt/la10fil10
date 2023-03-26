<?php

namespace App\Filament\Resources\DniResource\Pages;

use App\Filament\Resources\DniResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ListRecords;

class ListDnis extends ListRecords
{
    protected static string $resource = DniResource::class;

    protected function getActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}

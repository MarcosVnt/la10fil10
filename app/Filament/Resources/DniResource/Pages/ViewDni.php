<?php

namespace App\Filament\Resources\DniResource\Pages;

use App\Filament\Resources\DniResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ViewRecord;

class ViewDni extends ViewRecord
{
    protected static string $resource = DniResource::class;

    protected function getActions(): array
    {
        return [
            Actions\EditAction::make(),
        ];
    }
}

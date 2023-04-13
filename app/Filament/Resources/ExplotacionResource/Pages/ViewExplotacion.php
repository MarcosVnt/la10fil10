<?php

namespace App\Filament\Resources\ExplotacionResource\Pages;

use App\Filament\Resources\ExplotacionResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ViewRecord;

class ViewExplotacion extends ViewRecord
{
    protected static string $resource = ExplotacionResource::class;

    protected function getActions(): array
    {
        return [
            Actions\EditAction::make(),
        ];
    }
}

<?php

namespace App\Filament\Resources\TanqueResource\Pages;

use App\Filament\Resources\TanqueResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\EditRecord;

class EditTanque extends EditRecord
{
    protected static string $resource = TanqueResource::class;

    protected function getActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}

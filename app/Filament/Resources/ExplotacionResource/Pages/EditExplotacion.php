<?php

namespace App\Filament\Resources\ExplotacionResource\Pages;

use App\Filament\Resources\ExplotacionResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\EditRecord;

class EditExplotacion extends EditRecord
{
    protected static string $resource = ExplotacionResource::class;

    protected function getActions(): array
    {
        return [
            Actions\ViewAction::make(),
            Actions\DeleteAction::make(),
        ];
    }
}

<?php

namespace App\Filament\Resources\DniResource\Pages;

use App\Filament\Resources\DniResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\EditRecord;

class EditDni extends EditRecord
{
    protected static string $resource = DniResource::class;

    protected function getActions(): array
    {
        return [
            Actions\ViewAction::make(),
            Actions\DeleteAction::make(),
        ];
    }

    protected function getRedirectUrl(): string
{
    return $this->getResource()::getUrl('index');
}
}

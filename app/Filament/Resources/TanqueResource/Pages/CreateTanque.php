<?php

namespace App\Filament\Resources\TanqueResource\Pages;

use App\Filament\Resources\TanqueResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateTanque extends CreateRecord
{
    protected static string $resource = TanqueResource::class;

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}

<?php

namespace App\Filament\Resources\ExplotacionResource\Pages;

use App\Filament\Resources\ExplotacionResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateExplotacion extends CreateRecord
{
    protected static string $resource = ExplotacionResource::class;

    
    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}

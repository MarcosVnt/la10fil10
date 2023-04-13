<?php

namespace App\Filament\Resources\DniResource\Pages;

use App\Filament\Resources\DniResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateDni extends CreateRecord
{
    protected static string $resource = DniResource::class;


    protected function getRedirectUrl(): string
{
    return $this->getResource()::getUrl('index');
}


}

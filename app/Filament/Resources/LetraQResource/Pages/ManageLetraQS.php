<?php

namespace App\Filament\Resources\LetraQResource\Pages;

use App\Filament\Resources\LetraQResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ManageRecords;

class ManageLetraQS extends ManageRecords
{
    protected static string $resource = LetraQResource::class;

    protected function getActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}

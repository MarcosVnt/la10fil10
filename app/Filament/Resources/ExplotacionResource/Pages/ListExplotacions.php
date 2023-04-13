<?php

namespace App\Filament\Resources\ExplotacionResource\Pages;

use App\Filament\Resources\ExplotacionResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ListRecords;

class ListExplotacions extends ListRecords
{
    protected static string $resource = ExplotacionResource::class;

    protected function getActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}

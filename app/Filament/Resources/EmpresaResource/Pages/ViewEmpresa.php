<?php

namespace App\Filament\Resources\EmpresaResource\Pages;

use App\Filament\Resources\EmpresaResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ViewRecord;

class ViewEmpresa extends ViewRecord
{
    protected static string $resource = EmpresaResource::class;

    protected function getActions(): array
    {
        return [
            //Actions\EditAction::make(),
        ];
    }
}

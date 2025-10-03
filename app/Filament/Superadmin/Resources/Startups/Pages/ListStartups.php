<?php

namespace App\Filament\Superadmin\Resources\Startups\Pages;

use App\Filament\Superadmin\Resources\Startups\StartupsResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListStartups extends ListRecords
{
    protected static string $resource = StartupsResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}

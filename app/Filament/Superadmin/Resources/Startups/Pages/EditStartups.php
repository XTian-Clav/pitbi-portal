<?php

namespace App\Filament\Superadmin\Resources\Startups\Pages;

use App\Filament\Superadmin\Resources\Startups\StartupsResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditStartups extends EditRecord
{
    protected static string $resource = StartupsResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}

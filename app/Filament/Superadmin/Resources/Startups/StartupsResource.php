<?php

namespace App\Filament\Superadmin\Resources\Startups;

use App\Filament\Superadmin\Resources\Startups\Pages\CreateStartups;
use App\Filament\Superadmin\Resources\Startups\Pages\EditStartups;
use App\Filament\Superadmin\Resources\Startups\Pages\ListStartups;
use App\Filament\Superadmin\Resources\Startups\Schemas\StartupsForm;
use App\Filament\Superadmin\Resources\Startups\Tables\StartupsTable;
use App\Models\Startups;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;
use Filament\Tables\Columns\TextColumn;

class StartupsResource extends Resource
{
    protected static ?string $model = Startups::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRocketLaunch;

    public static function form(Schema $schema): Schema
    {
        return StartupsForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return StartupsTable::configure($table);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => ListStartups::route('/'),
            'create' => CreateStartups::route('/create'),
            'edit' => EditStartups::route('/{record}/edit'),
        ];
    }
}

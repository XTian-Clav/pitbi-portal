<?php

namespace App\Filament\Superadmin\Resources\Startups\Schemas;

use Filament\Schemas\Schema;
use Filament\Forms;

class StartupsForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema->schema([
            Forms\Components\TextInput::make('startup_name')
                ->label('Startup Name')
                ->required()
                ->maxLength(255)
                ->placeholder('Enter the startup name'),

            Forms\Components\TextInput::make('founder')
                ->label('Founder')
                ->required()
                ->maxLength(255)
                ->placeholder('Enter the founder name'),

            Forms\Components\DatePicker::make('submission_date')
                ->label('Submission Date')
                ->required()
                ->native(false), // optional: use JS datepicker instead of browser default

            Forms\Components\Select::make('status')
                ->label('Status')
                ->options([
                    'Pending'  => 'Pending',
                    'Approved' => 'Approved',
                    'Rejected' => 'Rejected',
                ])
                ->default('Pending')
                ->required()
                ->native(false),
        ]);
    }
}

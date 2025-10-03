<?php

namespace App\Filament\Superadmin\Resources\Startups\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Tables\Table;

use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\SelectFilter;

class StartupsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                // 1. Startup Name Column
                TextColumn::make('startup_name')
                    ->searchable()
                    ->sortable(),

                // 2. Founder Column
                TextColumn::make('founder')
                    ->searchable(),

                // 3. Submission Date
                TextColumn::make('submission_date')
                    ->date()
                    ->sortable(),

                // 4. Status Column
                TextColumn::make('status')
                    ->badge() // Display the Enum label with a colored badge
                    ->sortable(),
                
            ])
            ->filters([
                SelectFilter::make('status')
                    ->options([
                        'Approve' => 'Approved',
                        'Reject' => 'Rejected',
                        'Pending' => 'Pending',
                    ]),
            ])
            ->recordActions([
                EditAction::make(),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }
}

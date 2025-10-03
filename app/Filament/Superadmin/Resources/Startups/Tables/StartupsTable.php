<?php

namespace App\Filament\Superadmin\Resources\Startups\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteAction;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Actions\ViewAction;
use Filament\Tables\Table;

use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\SelectFilter;

class StartupsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->recordUrl(null)
            ->defaultSort('startup_name', 'asc') // ASC default
            ->columns([
                // 1. Startup Name Column
                TextColumn::make('startup_name')
                    ->label('Startup Name')
                    ->searchable()
                    ->sortable(),

                // 2. Founder Column
                TextColumn::make('founder')
                    ->label('Founder')
                    ->searchable(),

                // 3. Submission Date
                TextColumn::make('submission_date')
                    ->label('Submitted On')
                    ->date('M d, Y')
                    ->sortable(),

                // 4. Status Column
                TextColumn::make('status')
                    ->badge()
                    ->sortable()
                    ->colors([
                        'success' => 'Approved',
                        'danger'  => 'Rejected',
                        'warning' => 'Pending',
                    ]),
            ])
            ->filters([
                SelectFilter::make('status')
                    ->label('Status')
                    ->options([
                        'Approved' => 'Approved',
                        'Rejected' => 'Rejected',
                        'Pending'  => 'Pending',
                    ]),
            ])
            ->recordActions([
                ViewAction::make()->color('info'),
                EditAction::make()->color('warning'),
                DeleteAction::make(),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }
}

<?php

namespace App\Filament\Resources\Titles\RelationManagers;

use App\Filament\Resources\Cities\CityResource;
use Filament\Actions\AttachAction;
use Filament\Actions\CreateAction;
use Filament\Actions\DetachAction;
use Filament\Actions\DetachBulkAction;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class CitiesRelationManager extends RelationManager
{
    protected static string $relationship = 'cities';

    protected static ?string $title = 'Cities - BelongsToMany - No duplicates';

    protected static ?string $relatedResource = CityResource::class;

    public function table(Table $table): Table
    {
        return $table
            ->allowDuplicates()
            ->pushColumns([
                TextColumn::make('text'),
            ])
            ->headerActions([
                AttachAction::make()
                    ->preloadRecordSelect(),
            ])
            ->recordActions([
                DetachAction::make(),
            ])
            ->toolbarActions([
                DetachBulkAction::make(),
            ]);
    }
}

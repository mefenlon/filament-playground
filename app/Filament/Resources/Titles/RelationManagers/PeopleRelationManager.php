<?php

namespace App\Filament\Resources\Titles\RelationManagers;

use App\Filament\Resources\People\PersonResource;
use Filament\Actions\AttachAction;
use Filament\Actions\CreateAction;
use Filament\Actions\DetachAction;
use Filament\Actions\DetachBulkAction;
use Filament\Forms\Components\TextInput;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Schemas\Schema;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class PeopleRelationManager extends RelationManager
{
    protected static string $relationship = 'people';

    protected static ?string $title = 'People - MorphToMany - Intermediate Table Model - allowDuplicates';

    protected static ?string $relatedResource = PersonResource::class;

    public function table(Table $table): Table
    {
        return $table
            ->allowDuplicates()
            ->pushColumns([
                TextColumn::make('role'),
                TextColumn::make('text'),
            ])
            ->headerActions([
                AttachAction::make()
                    ->schema(fn (AttachAction $action): array => [
                        $action->getRecordSelect(),
                        TextInput::make('text')->required(),
                        TextInput::make('role')->required(),
                    ])
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

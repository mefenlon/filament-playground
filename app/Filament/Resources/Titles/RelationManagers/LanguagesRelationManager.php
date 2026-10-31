<?php

namespace App\Filament\Resources\Titles\RelationManagers;

use App\Filament\Resources\Languages\LanguageResource;
use Filament\Actions\AttachAction;
use Filament\Actions\CreateAction;
use Filament\Actions\DetachAction;
use Filament\Actions\DetachBulkAction;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Tables\Table;

class LanguagesRelationManager extends RelationManager
{
    protected static string $relationship = 'languages';

    protected static ?string $title = 'Languages - MorphToMany - No duplicates';

    protected static ?string $relatedResource = LanguageResource::class;

    public function table(Table $table): Table
    {
        return $table
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

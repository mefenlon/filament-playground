<?php

namespace App\Filament\Resources\Titles\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class TitleForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('sort_title')
                    ->required(),
                TextInput::make('display_title'),
                TextInput::make('abbreviation'),
            ]);
    }
}

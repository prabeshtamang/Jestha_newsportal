<?php

namespace App\Filament\Admin\Resources\Categories\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class CategoryForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make([
                    TextInput::make('title')
                        ->required(),
                    TextInput::make('slug')
                        ->required(),
                ])->columns(2)->columnSpanFull()->label('General')->description('Input Category title and slug'),
               

                Section::make('Meta-Information')
                    ->columns(2)
                    ->columnSpanFull()
                    ->description('Meta Information input from here')
                    ->Schema([
                        TextInput::make('meta_title')
                            ->default(null),
                        Textarea::make('meta_keywords')
                            ->default(null)
                            ->columnSpanFull(),
                        Textarea::make('meta_description')
                            ->default(null)
                            ->columnSpanFull(),
                    ])
            ]);
    }
}

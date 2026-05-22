<?php

namespace App\Filament\Admin\Resources\Articles\Schemas;

use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;
use Filament\Tables\Columns\Column;

class ArticleForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Basic Information')
                    ->columns(2)
                    ->columnSpanFull()
                    ->Schema([
                        Select::make('categories')
                        ->multiple()
                        ->searchable()
                        ->preload()
                        ->relationship('categories','title'),
                        TextInput::make('title')
                            ->required(),
                        TextInput::make('slug')
                            ->required(),
                        RichEditor::make('description')
                        ->columnSpanFull()
                            ->required(),
                        TextInput::make('author_name')
                            ->required(),
                        FileUpload::make('image')
                            ->image()
                            ->columnSpanFull()
                            ->required(),
                    ]),
                Section::make()
                ->columns(2)
                ->columnSpanFull()
                    ->schema([
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

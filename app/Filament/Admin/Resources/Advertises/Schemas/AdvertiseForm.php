<?php

namespace App\Filament\Admin\Resources\Advertises\Schemas;

use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Schema;

class AdvertiseForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                FileUpload::make('banner')
                    ->required(),
                TextInput::make('redirect_link')
                    ->required(),
                TextInput::make('company_name')
                    ->required(),
                DatePicker::make('expiry_date')
                    ->required(),
            ]);
    }
}

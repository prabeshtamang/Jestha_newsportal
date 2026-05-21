<?php

namespace App\Filament\Admin\Resources\Advertises\Pages;

use App\Filament\Admin\Resources\Advertises\AdvertiseResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditAdvertise extends EditRecord
{
    protected static string $resource = AdvertiseResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}

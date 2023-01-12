<?php

namespace App\Filament\Resources\GuestsResource\Pages;

use App\Filament\Resources\GuestsResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\EditRecord;

class EditGuests extends EditRecord
{
    protected static string $resource = GuestsResource::class;

    protected function getActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}

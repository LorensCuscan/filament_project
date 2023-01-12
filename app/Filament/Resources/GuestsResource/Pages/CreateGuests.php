<?php

namespace App\Filament\Resources\GuestsResource\Pages;

use App\Filament\Resources\GuestsResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateGuests extends CreateRecord
{
    protected static string $resource = GuestsResource::class;
}

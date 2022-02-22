<?php

namespace App\Filament\Resources\TestResource\Pages;

use App\Filament\Resources\TestResource;
use Filament\Resources\Pages\EditRecord;

class EditTest extends EditRecord
{
    use EditRecord\Concerns\Translatable;
    protected static string $resource = TestResource::class;
}

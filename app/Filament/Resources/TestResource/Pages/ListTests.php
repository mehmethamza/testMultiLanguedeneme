<?php

namespace App\Filament\Resources\TestResource\Pages;

use App\Filament\Resources\TestResource;
use Filament\Resources\Pages\ListRecords;


class ListTests extends ListRecords
{

    use ListRecords\Concerns\Translatable;
    protected static string $resource = TestResource::class;
}

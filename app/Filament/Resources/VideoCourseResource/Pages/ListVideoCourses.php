<?php

namespace App\Filament\Resources\VideoCourseResource\Pages;

use App\Filament\Resources\VideoCourseResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListVideoCourses extends ListRecords
{
    protected static string $resource = VideoCourseResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make()->label('Tambah Video'),
        ];
    }
}

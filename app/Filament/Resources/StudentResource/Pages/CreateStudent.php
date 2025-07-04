<?php

namespace App\Filament\Resources\StudentResource\Pages;

use App\Filament\Resources\StudentResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateStudent extends CreateRecord
{
    protected static string $resource = StudentResource::class;

    public function getTitle(): string
    {
        return 'Tambah Mahasiswa'; // Your custom page title
    }

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}

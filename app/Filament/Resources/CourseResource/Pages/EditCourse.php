<?php

namespace App\Filament\Resources\CourseResource\Pages;

use App\Filament\Resources\CourseResource;
use App\Models\Course;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Arr;

class EditCourse extends EditRecord
{
    protected static string $resource = CourseResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }

    public function getTitle(): string
    {
        return 'Edit Materi'; // Your custom page title
    }

    protected function handleRecordUpdate(Model $record, array $data): Model
    {
        if (Arr::first($data['module_file']) != $record->module_file) {
            $data['module_file'] = Arr::first($data['module_file']);
        } else {
            $data['module_file'] = $record->module_file;
        }

        $record->update($data);

        return $record;
    }
}

<?php

namespace App\Filament\Resources\StudentResource\Pages;

use App\Filament\Resources\StudentResource;
use App\Imports\StudentsImport;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\ViewField;
use Filament\Notifications\Notification;
use Maatwebsite\Excel\Facades\Excel;

class ListStudents extends ListRecords
{
    protected static string $resource = StudentResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make()->label('Tambah Mahasiswa'),
            Actions\Action::make('importStudents')
                ->label("Impor Data Mahasiswa")
                ->icon('heroicon-o-document-arrow-down')
                ->button()
                ->form([
                    ViewField::make('templateInfo')
                        ->view('filament.components.download-template'),
                    FileUpload::make('import_file')
                        ->label("File Impor")
                        ->acceptedFileTypes([
                            'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet',
                            'application/vnd.ms-excel',
                        ])
                        ->required(),
                ])
                ->action(function (array $data) {
                    $file = public_path('storage/' . $data['import_file']);
                    try {
                        Excel::import(new StudentsImport, $file);

                        Notification::make()
                            ->title("Data Mahasiswa Berhasil Diimpor")
                            ->success()
                            ->send();
                    } catch (\Throwable $th) {
                        Notification::make()
                            ->title("Data Mahasiswa Gagal Diimpor")
                            ->danger()
                            ->send();
                    }
                })
        ];
    }
}

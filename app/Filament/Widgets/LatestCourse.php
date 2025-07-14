<?php

namespace App\Filament\Widgets;

use App\Models\Course;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Filament\Widgets\TableWidget as BaseWidget;

class LatestCourse extends BaseWidget
{
    protected static ?int $sort = 4;
    protected int | string | array $columnSpan = 'full';

    public function getTableHeading(): string
    {
        return 'Materi Terbaru';
    }

    public function table(Table $table): Table
    {
        return $table
            ->query(
                Course::query()
                    ->latest('created_at')
            )
            ->paginationPageOptions([5])
            ->columns([
                TextColumn::make('title')
                    ->label('Judul')
                    ->limit(20),
                IconColumn::make('is_active')
                    ->label('Status Aktif')
                    ->boolean(),
                TextColumn::make('meeting_number')
                    ->label('Pertemuan ke-'),
                TextColumn::make('module_file')
                    ->label('Materi')
                    ->limit(10)
                    ->url(fn(Course $record): string => asset('storage/' . $record->module_file))
                    ->openUrlInNewTab(),
                TextColumn::make('created_at')
                    ->label('Tanggal')
                    ->dateTime('d/M/Y'),
            ]);
    }
}

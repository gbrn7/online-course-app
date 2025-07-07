<?php

namespace App\Filament\Widgets;

use App\Models\News;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Filament\Widgets\TableWidget as BaseWidget;

class LatestNews extends BaseWidget
{
    protected static ?int $sort = 3;
    public function table(Table $table): Table
    {
        return $table
            ->query(
                News::query()
                    ->latest('created_at')
                    ->take(10)
            )
            ->columns([
                TextColumn::make('title')->label('Judul'),
                IconColumn::make('is_published')->boolean()->label('Status Aktif'),
                TextColumn::make('created_at')->label('Tanggal')->dateTime('d/M/Y'),
            ]);
    }

    public function getTableHeading(): string
    {
        return 'Berita Terbaru';
    }
}

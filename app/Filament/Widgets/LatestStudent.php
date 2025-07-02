<?php

namespace App\Filament\Widgets;

use App\Models\Student;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Filament\Widgets\TableWidget as BaseWidget;

class LatestStudent extends BaseWidget
{
    protected static ?int $sort = 2;
    public function getTableHeading(): string
    {
        return 'Mahasiwa Terbaru';
    }

    public function table(Table $table): Table
    {
        return $table
            ->query(
                Student::query()
                    ->latest('created_at')
                    ->take(10)
            )
            ->columns([
                TextColumn::make('nim')
                    ->label('NIM')
                    ->searchable(),
                TextColumn::make('email')->searchable(),
                TextColumn::make('name')
                    ->label('Nama')
                    ->searchable(),
            ]);
    }
}

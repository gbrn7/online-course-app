<?php

namespace App\Filament\Resources;

use App\Filament\Resources\NewsResource\Pages;
use App\Models\News;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;

class NewsResource extends Resource
{
    protected static ?string $model = News::class;

    protected static ?string $navigationIcon = 'heroicon-o-newspaper';

    protected static ?string $navigationLabel = 'Berita';

    protected static ?int $navigationSort = 4;

    protected static ?string $modelLabel = "Berita ";

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('title')
                    ->required()
                    ->label('Judul'),
                Toggle::make('is_published')
                    ->required()
                    ->default(true)
                    ->label('Status Aktif'),
                RichEditor::make('content')
                    ->required()
                    ->columnSpanFull()
                    ->label('Konten'),
            ]);
    }

    public static function getEloquentQuery(): Builder
    {
        return parent::getEloquentQuery()->orderBy('id', 'desc');
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('title')
                    ->label("Judul")
                    ->limit(20)
                    ->searchable(),
                IconColumn::make('is_published')
                    ->label('Status Aktif')
                    ->boolean(),
                TextColumn::make('created_at')
                    ->label('Tanggal')
                    ->dateTime('d/M/Y'),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\ViewAction::make(),
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ])
            ->emptyStateHeading('Data Berita Tidak Ditemukan');
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListNews::route('/'),
            'create' => Pages\CreateNews::route('/create'),
            'view' => Pages\ViewNews::route('/{record}'),
            'edit' => Pages\EditNews::route('/{record}/edit'),
        ];
    }
}

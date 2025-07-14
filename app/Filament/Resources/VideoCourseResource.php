<?php

namespace App\Filament\Resources;

use App\Filament\Resources\VideoCourseResource\Pages;
use App\Models\Video;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class VideoCourseResource extends Resource
{
    protected static ?string $model = Video::class;

    protected static ?string $navigationIcon = 'heroicon-o-video-camera';

    protected static ?int $navigationSort = 2;

    protected static ?string $navigationLabel = 'Materi Video';

    protected static ?string $modelLabel = "Materi Video ";

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('label')
                    ->required(),
                TextInput::make('youtube_link')
                    ->required()
                    ->url()
                    ->required()
                    ->label('Link Video Youtube'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('label'),
                TextColumn::make('youtube_link')
                    ->label('Link Video')
                    ->limit(10)
                    ->url(fn(Video $record): ?string => $record->youtube_link)
                    ->openUrlInNewTab(),
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
            ->emptyStateHeading('Data Materi Video Tidak Ditemukan');
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
            'index' => Pages\ListVideoCourses::route('/'),
        ];
    }
}

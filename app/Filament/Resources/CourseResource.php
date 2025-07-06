<?php

namespace App\Filament\Resources;

use App\Filament\Resources\CourseResource\Pages;
use App\Models\Course;
use Filament\Forms\Components\FileUpload;
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
use Joaopaulolndev\FilamentPdfViewer\Forms\Components\PdfViewerField;

class CourseResource extends Resource
{
    protected static ?string $model = Course::class;

    protected static ?string $navigationIcon = 'heroicon-o-book-open';

    protected static ?int $navigationSort = 1;

    protected static ?string $navigationLabel = 'Materi';

    protected static ?string $modelLabel = "Materi ";

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('title')
                    ->required()
                    ->columnSpanFull()
                    ->label('Judul'),
                FileUpload::make('thumbnail')
                    ->image()
                    ->imageEditor()
                    ->required()
                    ->columnSpanFull()
                    ->imageEditorAspectRatios([
                        '16:9',
                    ])
                    ->label('Gambar Thumbnail'),
                TextInput::make('meeting_number')
                    ->required()
                    ->label('Pertemuan ke-')
                    ->integer(),
                Toggle::make('is_active')
                    ->required()
                    ->default(true)
                    ->label('Status Aktif'),
                TextInput::make('youtube_link')
                    ->required()
                    ->url()
                    ->nullable()
                    ->label('Link Video Youtube'),
                FileUpload::make('module_file')
                    ->acceptedFileTypes(['application/pdf'])
                    ->maxSize(1636)
                    ->required()
                    ->label('File Modul (PDF)'),
                RichEditor::make('content')
                    ->required()
                    ->required()
                    ->label('Konten')
                    ->columnSpanFull(),
                PdfViewerField::make('module_file')
                    ->label('PDF')
                    ->columnSpanFull()
                    ->minHeight('40svh'),
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
                    ->label('Judul')
                    ->limit(20)
                    ->searchable(),
                IconColumn::make('is_active')
                    ->label('Status Aktif')
                    ->boolean(),
                TextColumn::make('meeting_number')
                    ->label('Pertemuan ke-'),
                TextColumn::make('youtube_link')
                    ->label('Link Video')
                    ->limit(10)
                    ->url(fn(Course $record): string => $record->youtube_link)
                    ->openUrlInNewTab(),
                TextColumn::make('module_file')
                    ->label('Materi')
                    ->limit(10)
                    ->url(fn(Course $record): string => asset('storage/' . $record->getDocumentFilenameAttribute()))
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
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListCourses::route('/'),
            'create' => Pages\CreateCourse::route('/create'),
            'edit' => Pages\EditCourse::route('/{record}/edit'),
            'view' => Pages\ViewCourse::route('/{record}'),
        ];
    }
}

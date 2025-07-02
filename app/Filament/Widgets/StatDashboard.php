<?php

namespace App\Filament\Widgets;

use App\Models\Course;
use App\Models\News;
use App\Models\Student;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class StatDashboard extends BaseWidget
{
    protected static ?int $sort = 1;
    protected function getStats(): array
    {
        $students = Student::count();
        $course = Course::count();
        $news = News::count();
        return [
            Stat::make('Jumlah Mahasiswa', $students),
            Stat::make('Jumlah Materi', $course),
            Stat::make('Berita', $news),
        ];
    }
}

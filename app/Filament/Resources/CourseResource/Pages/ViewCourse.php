<?php

namespace App\Filament\Resources\CourseResource\Pages;

use App\Filament\Resources\CourseResource;
use Filament\Resources\Pages\ViewRecord;

class ViewCourse extends ViewRecord
{
  protected static string $resource = CourseResource::class;

  public function getTitle(): string
  {
    return 'Detail Materi'; // Your custom page title
  }
}

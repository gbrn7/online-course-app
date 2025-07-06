<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    protected $guarded = [];

    public function getCreatedAtHumanAttribute()
    {
        return Carbon::parse($this->created_at)->diffForHumans();
    }

    public function getCreatedAtFormattedAttribute()
    {
        return Carbon::parse($this->created_at)->translatedFormat('j F Y');
    }

    public function getYoutubeIdAttribute(): ?string
    {
        if (! $this->youtube_link) {
            return null;
        }

        // Match various formats of YouTube URL
        $pattern = '%(?:youtube(?:-nocookie)?\.com/(?:[^/]+/.+/|(?:v|e(?:mbed)?)/|.*[?&]v=)|youtu\.be/)([^"&?/ ]{11})%i';

        if (preg_match($pattern, $this->youtube_link, $matches)) {
            return $matches[1]; // Return the video ID
        }

        return null;
    }

    public function getDocumentFilenameAttribute()
    {
        $data = json_decode($this->module_file, true);

        if (is_array($data) && count($data)) {
            return collect($data)->first(); // returns the first value
        }

        return null;
    }
}

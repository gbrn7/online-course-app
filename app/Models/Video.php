<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Video extends Model
{
    protected $guarded = [];

    protected $appends = ['created_at_human'];

    public function getCreatedAtHumanAttribute()
    {
        return Carbon::parse($this->created_at)->diffForHumans();
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

    public function getCreatedAtFormattedAttribute()
    {
        return Carbon::parse($this->created_at)->translatedFormat('j F Y');
    }
}

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

    public function getEmbedLinkAttribute(): ?string
    {
        if (!$this->google_drive_link) {
            return null;
        }

        if (preg_match('/\/file\/d\/([^\/]+)\//', $this->google_drive_link, $matches)) {
            $fileId = $matches[1];
            return "https://drive.google.com/file/d/{$fileId}/preview";
        }

        return null; // or return the original link
    }

    public function getCreatedAtFormattedAttribute()
    {
        return Carbon::parse($this->created_at)->translatedFormat('j F Y');
    }
}
